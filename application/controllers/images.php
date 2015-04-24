<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of images
 *
 * @author kristopher.king
 */
class Images extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->_init();
    }

    private function _init() {
        $this->output->set_template('default');

        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
    }

    function index() {
        $this->load->view('upload_form', array('error' => ' '));
    }

    public function user_gallery() {
        $this->_init();
        $this->load->view('pages/gallery');
    }

    public function upload() {
        $this->_init();
        $this->load->helper('form');
        $this->load->view('pages/upload_form');
    }

    private function upload_image() {
        $data = array(
            'url' => $this->input->post('upload_data'),
        );
    }

    public function do_upload() {
        $config = array(
            'upload_path' => 'uploads',
            'allowed_types' => 'gif|jpg|png|JPG|jpeg',
            'max_size' => 2000,
            'max_width' => 1920,
            'max_heigh' => 1080,
        );
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('pages/upload_form', $error);
        } else {
            $this->load->model('Image');
            $this->Image->url = $this->input->post('upload_data');
            $data = array('upload_data' => $this->upload->data());

            if ($this->Image->insert_obj() != NULL) {
                $this->upload_image();
                $this->load->view('pages/upload_success', $data);
            }
            
        }
    }

}
