<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author kristopher.king
 */
class User extends MY_Model {

    /**
     * Unique Identifier
     * @var type int
     */
    public $id;

    /**
     * First Name of the user
     * @var type string
     */
    public $first_name;

    /**
     * Last Name of the user
     * @var type string
     */
    public $last_name;

    /**
     * User Email Address
     * @var type string
     */
    public $email_address;

    /**
     * Password created by the user
     * @var type string
     */
    public $password;

    /**
     * Status of the user
     * @var type string
     */
    public $status;

    function validate() {
        $password = md5($this->input->post('user_password'));
        $user = $this->get_by(array('email_address' => $this->input->post('email_address'), 'password' => $password));

        if ($user) {
            return true;
        }
    }

}
