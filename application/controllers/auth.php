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
    }

    private function _init() {
        $this->load->helper('url');
        $this->output->set_template('default');
        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
    }

    /**
     * Display Sign Up Page
     */
    public function sign_up() {
        $this->_init();
        $this->output->set_title('Sign Up');
        $this->load->helper('form');
        $this->load->view('pages/sign_up');
    }

    /**
     * Sign Out user when they select Sign Out on the Home page
     */
    public function signout() {
        $this->_init();
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }

    /**
     * Valiadate that the user is a member. Used as part of the
     * AJAX login functionality.
     */
    public function validate() {
        $this->load->model('User');
        //Error Messages
        
        //if the password and email address field is not filled in
        if (!$this->input->post('user_password') && !$this->input->post('email_address')) {
            echo 'empty-fields';
            return;
        }
        //if the email address filed is not filled in
        if (!$this->input->post('email_address')) {
            echo 'no-email';
            return;
        }
        //if the password filed is not filled in
        if (!$this->input->post('user_password')) {
            echo 'no-password';
            return;
        }
        $existing_user = $this->process_validate();
        //if email address and password is correct sign in the user
        if ($existing_user) {
            $this->_init();
            $this->_do_login($existing_user->id);
            redirect('', 'refresh');
        } else {//if the email address and/or password is inccorect
            echo 'fail';
            return;
        }
    }

    /**
     * Check to see if the User's Email Address and/or password is in the db
     * Used as part of AJAX login functionality
     */
    private function process_validate() {
        $user = new User();
        $password = md5($this->input->post('user_password'));
        $existing_user = $user->get_by(array('email_address' => $this->input->post('email_address'), 'password' => $password));

        if ($existing_user) {
            return $existing_user;
        }
    }

    /**
     * Sign the user in and redirect to home page
     */
    private function _do_login($user_id) {
        $data = array(
            'email_address' => $this->input->post('email_address'),
            'is_logged_in' => true,
            'user_id' => $user_id
        );
        $this->session->set_userdata($data);
    }

    /**
     * Create a new user and store in db. Used as part of Signup functionality
     */
    public function create_user() {
        $this->_init();
        $this->load->library('form_validation');
        //validation rules (requirements)
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[user_password]');

        //if validation fails stay on Sign up page and display error messages
        if (!$this->form_validation->run()) {
            $this->load->view('pages/sign_up');
        } else {
            //Create new user
            $this->load->model('User');
            $user = new User();
            $user_data = array();
            $user_data['first_name'] = $this->input->post('first_name');
            $user_data['last_name'] = $this->input->post('last_name');
            $user_data['email_address'] = $this->input->post('email_address');
            $user_data['status'] = $this->input->post('status');
            $user_data['password'] = md5($this->input->post('user_password'));
            $user_id = $user->insert($user_data);
            //save new user into the db
            if ($user_id != NULL) {
                $this->_do_login($user_id);
                $this->session->set_flashdata('success', 'Your account has been created successfully');
                redirect('', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Unfortunately an error occurred and we were unable to create your account, could you please try again');
                redirect(base_url . 'auth/sign_up');
            }
        }
    }

}
