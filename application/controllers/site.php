<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

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
     * Display Home page
     */
    public function index() {
        $this->_init();
        $this->load->helper('form');
        //Display home page and scroll the user down to Make Enquiry section if they fail form validation
        $this->load->view('pages/home', array('is_contact_validation' => false));
    }

    /**
     * Display the About page
     */
    public function about() {
        $this->_init();
        $this->load->view('pages/about');
    }

    /**
     * Display custom 404 page if a page does not exist
     */
    public function error_404() {
        $this->_init();
        $this->load->view('pages/404');
    }

    /**
     * Make an Enquiry functionality
     */
    public function make_enquiry() {
        $this->_init();
        $this->load->library('form_validation');
        //Enquiry form validation rules/requirements
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[4]|max_length[250]');

        //if submitted enquiry form does not meet requirements display error messages
        $this->form_validation->set_error_delimiters('<div>', '</div>');

        //if form does not validate then return the user to the Make Enquiry section (with error messages displayed)
        if (!$this->form_validation->run()) {
            $this->load->view('pages/home', array('is_contact_validation' => true));
        } else {
            $this->session->set_flashdata('success', 'Thankyou for your enquiry, we will respond as soon as possible');
            redirect(base_url() . '#Enquiry', 'refresh');
        }
        
        //Send Enquiry form data to the Airboats New Zealand email address
    }

}
