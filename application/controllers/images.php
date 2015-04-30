<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Images extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Image');
        $this->_init();
    }

    private function _init() {
        $this->output->set_template('default');

        $this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
        $this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
    }

    function index() {
        $this->load->view('pages/gallery');
    }

    public function user_gallery() {
        $data['result'] = $this->Image->get_images();
        $this->load->view('pages/gallery', $data);
    }

    public function upload() {
        $this->_init();
        $this->load->helper('form');
        $this->load->view('pages/upload_form');
    }

    private function upload_image() {
        $data = array(
            'url' => $this->input->post('file_name'),
        );
        $this->upload->data($data);
        
    }

    public function do_upload() {
        $config = array(
            'upload_path' => './uploads',
            'allowed_types' => 'gif|jpg|png|JPG|jpeg',
            'max_size' => 2000,
            'max_width' => 1920,
            'max_height' => 1080,
            'remove_spaces' => TRUE,
        );
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('pages/upload_form', $error);
        } else {
            
            $this->load->model('Image');
            $data = $this->upload->data();
            //Retrieve the file name of the image that has been uploaded by the user
            $file_name = $data['file_name'];
            //Inserts the name and file type of the image into the database
            $this->Image->url = $file_name;
            $this->Image->user_id = $this->session->userdata('user_id');

            if ($this->Image->insert_obj() != NULL) {
                $this->upload_image();
                //If the image upload was successful display success message
                $this->load->view('pages/upload_form');
                //Display success message along with a link to the gallery page so the user can view their uploaded image
            }
        }
    }

}
