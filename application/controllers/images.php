<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Images extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
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
            'url' => $this->input->post('full_path'),
        );
        $this->upload->data($data);
    }

    public function resize_image() {
        $config2['image_library'] = 'gd2';
        $config2['source_image'] = $this->upload->upload_path . $this->upload->file_name;
        $config2['new_image'] = 'thumbs';
        $config2['maintain_ratio'] = TRUE;
        $config2['create_thumb'] = TRUE;
        $config2['thumb_marker'] = '_thumb';
        $config2['width'] = 75;
        $config2['height'] = 50;
        $config2['overwrite'] = TRUE;
        $this->load->library('image_lib', $config2);
    }

    public function do_upload() {
        $config = array(
            'upload_path' => 'uploads',
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
            //Retrieve the url of the image that has been uploaded by the user
            $full_path = $data['full_path'];
            //Insert the full path (image location) of the image into the database
            $this->Image->url = $full_path;

            if ($this->Image->insert_obj() != NULL) {
                $this->resize_image();
                $this->upload_image();
                //If the image upload was successful display success message
                $this->load->view('pages/upload_success', $data);
            }
        }
    }

}
