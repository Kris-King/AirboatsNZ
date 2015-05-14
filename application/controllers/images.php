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

    /**
     * Display User Gallery 
     */
    function index() {
        $this->output->set_title('User Gallery');
        //Go to function user_gallery() -  (Which gets all user uploaded images. Create pagination if amount of images exceed a certain amount)
        $this->user_gallery();
    }

    public function user_gallery() {
        //Pagination functionality and how it is displayed
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

    /**
     * Get all images submitted by site users and display them on the User Gallery page
     */
    private function get_images($config) {
        $config['total_rows'] = $this->Image->count_all();
        $offset = $this->uri->segment($config['uri_segment']);
        //limit the amount of images that are displayed on one page
        $this->Image->limit($config['per_page'], $offset);
        //Get images based on their location and display them from there
        $this->db->select('url');
        $this->db->from('images');
        $query = $this->db->get();
        return $result = $query->result();
    }

    /**
     * Display Upload page
     */
    public function upload() {
        $this->_init();
        $this->output->set_title('Upload Images');
        //Display the upload page only if the a user is logged in
        if ($this->session->userdata('is_logged_in')) {
            $this->load->helper('form');
            $this->load->view('pages/upload_form');
        } else {//Display 401 page if the a user is not logged in
            $this->output->set_title('401 - Unauthorized Access');
            $this->load->view('pages/401');
        }
    }

    /**
     * Sets the file name of the image as the value that is inserted into the db
     */
    private function upload_image() {
        $data = array(
            'url' => $this->input->post('file_name'),
        );
        $this->upload->data($data);
    }

    /**
     * Upload Image functionality
     */
    public function do_upload() {
        $config = array(
            'upload_path' => './uploads',
            'allowed_types' => 'jpg|png|JPG|jpeg',
            'max_size' => 1000,
            'max_width' => 1920,
            'max_height' => 1080,
            'remove_spaces' => TRUE,
        );
        $this->load->library('upload', $config);
        //If uploaded image does not meet upload requirements display error message
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('pages/upload_form', $error);
        } else {//If uploaded image meets upload requirements
            $this->load->model('Image');
            $data = $this->upload->data();
            //Retrieve the file name of the image that has been uploaded by the user
            $file_name = $data['file_name'];
            //Inserts the name and file type of the image into the database
            $this->Image->url = $file_name;
            $this->Image->user_id = $this->session->userdata('user_id');

            if ($this->Image->insert_obj() != NULL) {
                $this->upload_image();
                //if the Image was uploaded successfully display this success message
                $this->session->set_flashdata('success', 'Your image was successfully uploaded. You can view your image');
                //If the image upload was successful display success message
                redirect('images/upload', 'refresh');
            } else {//if the image was able to be uploaded, display this error message
                $this->session->set_flashdata('success', 'There was a problem and we could not upload your image, could you please try again');
                redirect('images/upload', 'refresh');
            }
        }
    }

}
