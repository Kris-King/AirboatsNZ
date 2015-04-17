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
        $this->load->view('pages/home');
    }

    public function about() {
        $this->_init();
        $this->load->view('pages/about');
    }

    public function gallery() {
        $this->_init();
        $this->load->view('pages/gallery');
    }

    public function events() {
        $this->_init();
        $this->load->view('pages/events');
    }

    public function sign_up() {
        $this->_init();
        $this->load->helper('form');
        $this->load->view('pages/sign_up');
    }
    
        public function sign_in() {
        $this->_init();
        $this->load->helper('form');
        $this->load->view('pages/sign_in');
    }

}
