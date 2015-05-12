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

    public function index() {
        $this->_init();
        $this->load->helper('form');
        $this->load->view('pages/home', array('is_contact_validation' => false));
    }

    public function about() {
        $this->_init();
        $this->load->view('pages/about');
    }

    public function error_404() {
        $this->_init();
        $this->load->view('pages/404');
    }

    public function make_enquiry() {
        $this->_init();
        $this->load->library('form_validation');
        //validate
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[4]|max_length[250]');
        
        $this->form_validation->set_error_delimiters('<div>', '</div>');

        if (!$this->form_validation->run()) {
            $this->load->view('pages/home', array('is_contact_validation' => true));
            
        } else {
            $this->session->set_flashdata('success', 'Thankyou for your enquiry, we will respond as soon as possible');
            redirect(base_url().'#Enquiry', 'refresh');
            
        }
    }

}
