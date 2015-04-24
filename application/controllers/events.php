<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of admin
 *
 * @author kristopher.king
 */
class Events extends CI_Controller{
     
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
        $this->load->view('pages/admin_dashboard');
    }
    
    public function insert_update() {
        
    }
    
    public function delete_event() {
        
    }
    
}
