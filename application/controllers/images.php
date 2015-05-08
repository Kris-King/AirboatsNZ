<?php

if (!defined('BASEPATH'))
    exit('Direct Access Not Allowed');

class Images extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Image');
        $this->load->library('pagination');
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
        $per_page = 9;
        $uri_segment = 3;
        $config['base_url'] = base_url() . "images/user_gallery";
        $config['per_page'] = $per_page;
        $config['total_rows'] = $this->Image->count_all();
        $config['uri_segment'] = $uri_segment;
        $config['full_tag_open'] = "<ul class='pagination pagination-lg'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li></a>";
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = "<li class='next'>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = "<li class='previous'>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $config['num_links'] = round($config["total_rows"] / $config["per_page"]);

        $this->pagination->initialize($config);
        $data['result'] = $this->get_images($config);
        $this->load->view('pages/gallery', $data);
    }

    private function get_images($config) {
        $config['total_rows'] = $this->Image->count_all();
        $offset = $this->uri->segment($config['uri_segment']);
        $this->Image->limit($config['per_page'], $offset);
        $this->db->select('url');
        $this->db->from('images');
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function upload() {
        $this->_init();
        if ($this->session->userdata('is_logged_in')) {
            $this->load->helper('form');
            $this->load->view('pages/upload_form');
        } else {
            $this->load->view('pages/403');
        }
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
