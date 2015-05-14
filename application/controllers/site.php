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
        $this->output->set_title('Home');
        $this->load->helper('form');
        //Display home page and scroll the user down to Make Enquiry section if they fail form validation
        $this->load->view('pages/home', array('is_contact_validation' => false));
    }

    /**
     * Display the About page
     */
    public function about() {
        $this->_init();
        $this->output->set_title('About');
        $this->load->view('pages/about');
    }

    /**
     * Display custom 404 page if a page does not exist
     */
    public function error_404() {
        $this->_init();
        $this->output->set_title('404 Page not Found');
        $this->load->view('pages/404');
    }

    /**
     * Make an Enquiry functionality
     */
    public function make_enquiry() {
        $this->_init();
        $this->load->library('email');
        $this->load->library('form_validation');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;


        //Enquiry form validation rules/requirements
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|min_length[4]|max_length[250]');

        //if submitted enquiry form does not meet requirements display error messages
        $this->form_validation->set_error_delimiters('<div>', '</div>');

        $enquiry_data = array();
        $enquiry_data['first_name'] = $this->input->post('first_name');
        $enquiry_data['last_name'] = $this->input->post('last_name');
        $enquiry_data['email_address'] = $this->input->post('email_address');
        $enquiry_data['comment'] = $this->input->post('comment');

        //if form does not validate then return the user to the Make Enquiry section (with error messages displayed)
        if (!$this->form_validation->run()) {
            $this->load->view('pages/home', array('is_contact_validation' => true));
        } else {//If form validates send form info to an email address stated below
            //Values of the Enquiry form (User Input)
            $body = '<p>First Name: ' . $enquiry_data['first_name'] . '</p>' . '<p>Last Name: ' . $enquiry_data['last_name'] . '</p>' .
                    '<p>Email: ' . $enquiry_data['email_address'] . '</p>' . '<p>Comment: ' . $enquiry_data['comment'] . '</p>';
            //Send Enquiry form data to the Airboats New Zealand email address
            $this->email->initialize($config);
            //Send contents of a Users enquiry to the email address 'airboatsnewzealand@gmail.com'
            $this->email->to('airboatsnewzealand@gmail.com');
            //Indicates who the email is from, in this case the Web Site itself
            $this->email->from('enquiries@airboatsnewzealand.nz', 'Airboats New Zealand');
            //State the title of the message
            $this->email->subject('User Enquiry');
            //The message is a string value which contains the values of the information submitted by a user
            $this->email->message($body);
            $this->email->send();
            //Display Success message when the email has been sent
            $this->session->set_flashdata('success', 'Thankyou for your enquiry, we will respond as soon as possible');
            //Send the user back to the Enquiry section which will have a success message for them
            redirect(base_url() . '#Enquiry', 'refresh');
        }
    }

}
