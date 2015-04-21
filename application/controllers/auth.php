<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of auth
 *
 * @author kristopher.king
 */
class Auth extends CI_Controller {

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
     * Display Sign In Page
     */
    public function signin() {
        $this->_init();
        $this->load->helper('form');
        $this->load->view('pages/sign_in');
    }

    /**
     * Display Sign Up Page
     */
    public function sign_up() {
        $this->_init();
        $this->load->helper('form');
        $this->load->view('pages/sign_up');
    }

    public function signout() {
        $this->_init();
        $this->session->sess_destroy();
        $this->load->view('pages/home');
    }

    /**
     * Valiadate that the user is a member. Used as part of the
     * AJAX login functionality.
     */
    public function validate() {
        $this->load->model('User');
        if ($this->User->validate()) {
            $this->_do_login();
            $this->load->view('pages/home');
        } else { // incorrect username or password
            $this->session->set_flashdata('error', 'Incorrect username and/or password. Please try again');
            redirect('/site/sign_in', 'refresh');
        }
    }

    /**
     * Sign the user in and redirect to home page
     */
    private function _do_login() {
        $data = array(
            'email_address' => $this->input->post('email_address'),
            'is_logged_in' => true
        );
        $this->session->set_userdata($data);
    }

    /**
     * Create a new user and store in db. Used as part of Signup functionality
     */
    public function create_user() {
        $this->load->library('form_validation');
        //validate
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[user_password]');

        if (!$this->form_validation->run()) {
            $this->load->view('pages/sign_up');
        } else {
            //Create new user
            $this->load->model('User');
            $this->User->first_name = $this->input->post('first_name');
            $this->User->last_name = $this->input->post('last_name');
            $this->User->email_address = $this->input->post('email_addresss');
            $this->User->status = $this->input->post('status');
            $this->User->password = md5($this->input->post('user_password'));

            //save new user
            if ($this->User->insert_obj() != NULL) {
                $this->_do_login();
                $this->session->set_flashdata('Success :)', 'Account successfully created');
                redirect('/site', 'refresh');
            } else {
                $this->session->set_flashdata('Error :(', 'Unfortunately an error occurred and we were unable to create your account');
                redirect('auth/sign_up');
            }
        }
    }

}
