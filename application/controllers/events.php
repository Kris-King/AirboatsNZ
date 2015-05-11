<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admin
 *
 * @author kristopher.king
 */
class Events extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->_init();
    }

    private function _init() {
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
    }

    /**
     * Displays the Admin Dashboard and lists all of the events created by the Admin.
     */
    public function index() {
        $this->_init();
        $this->load->helper('url');
        //Display Admin page if the Site Administrator is logged in
        if ($this->session->userdata('is_logged_in')) {
            $this->load->library('table');
            $events = array();
            $images = array();
            $this->load->model('Event');
            $this->load->model('Image');
            $rows = $this->Event->get_all('events');
            $user_images = $this->Image->get_all('images');
            foreach ($rows as $row) {
                $events[] = array(
                    $row->id,
                    $row->title,
                    '<a href="' . base_url() . 'events/add_edit/' . $row->id . '"class="btn btn-primary btn-block"><span class="glyphicon glyphicon-wrench"></span> Edit</a>',
                    '<a href="' . base_url() . 'events/delete_event/' . $row->id . '" class="btn btn-danger btn-block" confirm-event-deletion><span class="glyphicon glyphicon-trash"></span> Delete</a>',
                );
            }
            foreach ($user_images as $r) {
                $images[] = array(
                    $r->id,
                    $r->user_id,
                    $r->url,
                    '<a href="' . base_url() . 'events/delete_image/' . $r->id . '" class="btn btn-danger btn-block" confirm-image-deletion><span class="glyphicon glyphicon-trash"></span> Delete</a>',
                );
            }
            $this->load->view('pages/admin', array(
                'events' => $events,
                'images' => $images,
            ));
        } else {//If any user other than the site adminstrator trys to access the admin dashbaord then display the 403 page
            $this->load->view('pages/403');
        }
    }

    /**
     * Delete functionality for deleting an event.
     */
    public function delete_event($id) {
        $this->load->model('Event');
        //if the Event was deleted successfully display this success message
        if ($this->Event->delete($id)) {
            $this->session->set_flashdata('Success :)', 'Event was successfully deleted');
        } else {//if the Event was not deleted successfully display this error message
            $this->session->set_flashdata('Error :(', 'We were not able to delete your Event, could you please try again.');
        }

        //Return the user back to the Admin page
        redirect('events', 'refresh');
    }

    /**
     * Delete functionality for deleting an event.
     */
    public function delete_image($id) {
        $this->load->model('Image');
        //if the Event was deleted successfully display this success message
        if ($this->Image->delete($id)) {
            $this->session->set_flashdata('Success :)', 'User image was successfully deleted');
        } else {//if the Event was not deleted successfully display this error message
            $this->session->set_flashdata('Error :(', 'We were not able to delete the Image, could you please try again.');
        }

        //Return the user back to the Admin page
        redirect('events', 'refresh');
    }

    /**
     * Display the Events page.
     */
    public function upcoming_events() {
        $this->load->helper('url');
        $this->load->model('Event');
        $this->load->library('pagination');
        //Pagination functionality.
        $per_page = 5;
        $uri_segment = 3;
        $config['base_url'] = base_url() . "events/upcoming_events";
        $config['per_page'] = $per_page;
        $config['total_rows'] = $this->Event->count_all();
        $config['uri_segment'] = $uri_segment;
        $config['full_tag_open'] = "<ul class='pagination pagination-lg'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li></a>";
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = "<li class='next'>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = "<li class='previous'>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $config['num_links'] = round($config["total_rows"] / $config["per_page"]);

        $this->pagination->initialize($config);
        //Displays the Events from the db onto the Upcoming Events page
        $data['result'] = $this->get_events($config);
        $this->load->view('pages/events', $data);
    }

    /**
     * Get all events from the database. This will be called on the Events page which then displays the events.
     */
    private function get_events($config) {
        //Gather all events from the database
        $config['total_rows'] = $this->Event->count_all();
        $offset = $this->uri->segment($config['uri_segment']);
        //Restrict the amount of events that are displayed on the 'Events' page
        $this->Event->limit($config['per_page'], $offset);
        //Select the following values from the database (Values which will be then viewed on the 'Events' page)
        $this->db->select('id');
        $this->db->select('title');
        $this->db->select('start_date');
        $this->db->select('end_date');
        $this->db->select('description');
        $this->db->from('events');
        //Sets up a for each loop which will then display the events
        $query = $this->db->get();
        return $result = $query->result();
    }

    /**
     * Display information for the Event that the user wants to learn more about.
     */
    public function display_event($id) {
        $this->_init();
        $this->load->helper('url');
        $this->load->model('Event');

        $event_data = $this->Event->get_by(array('id' => $id));



        $this->load->view('pages/event', array(
            'event_data' => $event_data,
        ));
    }

    /**
     * Add/Edit functionality for creating and updating events.
     */
    public function add_edit($id = NULL) {
        $this->_init();
        $this->load->helper('form');
        $this->load->model('Event');
        $event = new Event();

        //is add/edit
        if (!$this->input->post()) {
            //if is add
            if ($id == NULL) {
                //populate with defaults
                $event->title = '';
                $event->start_date = '';
                $event->end_date = '';
                $event->city_town = '';
                $event->country = '';
                $event->description = '';
            } else { //if is edit
                //get Todo from db by id
                $this->load->model('Event');
                $event = $this->Event->get($id);
            }
            $this->load->view('pages/add-edit', array(
                'edit' => $id != NULL,
                'event' => $event,
            ));
        } else { //if is insert/update
            $this->_insert_update($event, $id);
        }
    }

    /**
     * Inserting Events in the database and updating events in the databse which have bee edited.
     */
    private function _insert_update($event, $id) {
        //Populate form fields with data from the post
        $event->title = $this->input->post('title');
        $event->start_date = $this->input->post('start_date');
        $event->end_date = $this->input->post('end_date');
        $event->city_town = $this->input->post('city_town');
        $event->country = $this->input->post('country');
        $event->description = $this->input->post('description');
        $event->user_id = $this->session->userdata('user_id');

        //Event Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[30]',
            ),
            array(
                'field' => 'start_date',
                'label' => 'Start Date',
                'rules' => 'required|callback_date_validation',
            ),
            array(
                'field' => 'end_date',
                'label' => 'End Date',
                'rules' => 'required|callback_date_validation',
            ),
            array(
                'field' => 'city_town',
                'label' => 'City/Town',
                'rules' => 'required',
            ),
            array(
                'field' => 'country',
                'label' => 'Country',
                'rules' => 'required',
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required|max_length[250]',
            ),
        ));

        $this->form_validation->set_error_delimiters('<div>', '</div>');

        //if Admin submitted Event does not pass validation
        if (!$this->form_validation->run()) {
            $this->load->view('pages/add-edit', array(
                'edit' => $id != NULL,
                'event' => $event,
            ));
        } else { //if admin submitted Event Validates
            $event->id = (int) $id;
            $event->save($id);
            // Add flash and redirect
            $action = "";
            if ($id == NULL) {
                $action = "Added";
            } else {
                $action = "Updated";
            }

            $this->session->set_flashdata('Success :)', 'Event was Successfully ' . $action);
            redirect('events', 'refresh');
        }
    }

    /**
     * Date validation callback.
     * @param string $input
     * @return boolean
     */
    public function date_validation($input) {
        $test_date = explode('-', $input);
        if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
            $this->form_validation->set_message('date_validation', 'The %s field must be in DD/MM/YYYY format.');
            return FALSE;
        }
        return TRUE;
    }

}
