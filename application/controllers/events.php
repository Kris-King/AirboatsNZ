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

    public function index() {
        $this->_init();
        $this->load->helper('url');
        $this->load->library('table');
        $events = array();
        $this->load->model('Event');
        $rows = $this->Event->get_all('events');
        foreach ($rows as $row) {
            $events[] = array(
                $row->title,
                $row->description,
                anchor('events/add_edit/' . $row->id, 'Edit','class="btn btn-primary"').' ' 
                . anchor('events/index'. $row->id, 'Delete','class="btn btn-primary"'),
            );
        }

        $this->load->view('pages/admin', array(
            'events' => $events,
        ));
    }


    public function upcoming_events() {
        $data['result'] = $this->get_events();
        $this->load->view('pages/events', $data);
    }

    public function upcoming_event() {
        $this->_init();
        $this->load->view('pages/event');
    }

    private function get_events() {
        $this->db->select('title');
        $this->db->select('start_date');
        $this->db->select('end_date');
        $this->db->select('description');
        $this->db->from('events');
        $query = $this->db->get();
        return $result = $query->result();
    }

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

    private function _insert_update($event, $id) {
        //populate from the post
        $event->title = $this->input->post('title');
        $event->start_date = $this->input->post('start_date');
        $event->end_date = $this->input->post('end_date');
        $event->city_town = $this->input->post('city_town');
        $event->country = $this->input->post('country');
        $event->description = $this->input->post('description');
        $event->user_id = $this->session->userdata('user_id');

        // Todo Validation
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

        //if User submitted Todo does not pass validation
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

            $this->session->set_flashdata('Success :)', 'Event Successfully ' . $action);
            redirect('/events/', 'refresh');
        }
    }

    /**
     * Delete  a Todo.
     */
    public function delete_event($event, $id) {
        $this->load->model('Event');
        if ($this->Event->delete($id)) {
            $this->session->set_flashdata('Success :)', 'Event was successfully deleted');
        } else {
            $this->session->set_flashdata('Error :(', 'We were not able to delete your Event, could you please try again.');
        }

        //Return the user back to the Admin page
        redirect('/events/', 'refresh');
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
