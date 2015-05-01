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

    public function admin_dashboard() {
        $this->_init();
        $this->load->helper('form');
        $this->load->view('pages/admin');
    }

    public function add_edit($id = NULL) {
        $this->_init();
        $this->load->helper('form');
        $this->load->model('Todo');
        $todo = new Todo();

        //is add/edit
        if (!$this->input->post()) {
            //if is add
            if ($id == NULL) {
                //populate with defaults
                $todo->title = '';
                $todo->status = '';
                $todo->due_on = '';
                $todo->priority = '';
                $todo->description = '';
                $todo->comment = '';
            } else { //if is edit
                //get Todo from db by id
                $this->load->model('Todo');
                $todo = $this->Todo->get($id);
            }
            $this->load->view('pages/add-edit', array(
                'edit' => $id != NULL,
                'todo' => $todo,
            ));
        } else { //if is insert/update
            $this->_insert_update($todo, $id);
        }
    }

    public function insert_update($event, $id) {
        //populate from the post
        $event->title = $this->input->post('title');
        $event->status = $this->input->post('status');
        $event->due_on = $this->input->post('due_on');
        $event->priority = $this->input->post('priority');
        $event->description = $this->input->post('description');
        $event->comment = $this->input->post('comment');

        // Todo Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[30]',
            ),
            array(
                'field' => 'status',
                'label' => 'Status',
            ),
            array(
                'field' => 'due_on',
                'label' => 'Due On',
                'rules' => 'required|callback_date_validation',
            ),
            array(
                'field' => 'priority',
                'label' => 'Priority',
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required|max_length[100]',
            ),
            array(
                'field' => 'comment',
                'label' => 'Comment',
                'rules' => 'max_length[150]',
            ),
        ));

        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');

        //if User submitted Todo does not pass validation
        if (!$this->form_validation->run()) {
            $this->load->view('pages/admin', array(
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
            redirect('/events/admin_dashboard/', 'refresh');
        }
    }

    /**
     * Delete  a Todo.
     */
//    public function delete_event($status, $id) {
//
//
//        $this->load->model('Todo');
//        if ($this->Todo->delete($id)) {
//            $this->session->set_flashdata('Success :)', 'Todo was successfully deleted');
//        } else {
//            $this->session->set_flashdata('Error :(', 'We were not able to delete your Todo, could you please try again.');
//        }
//
//        //Return the user back to the List page
//        redirect('/todos/status/' . $status, 'refresh');
//    }

    /**
     * Date validation callback.
     * @param string $input
     * @return boolean
     */
    public function date_validation($input) {
        $test_date = explode('-', $input);
        if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
            $this->form_validation->set_message('date_validation', 'The %s field must be in YYYY-MM-DD format.');
            return FALSE;
        }
        return TRUE;
    }

}
