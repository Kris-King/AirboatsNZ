<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Image extends MY_Model {

    /**
     * Unique Identifier
     * @var type int
     */
    public $id;

    /**
     * url of the image (location of the image that was uploaded by the user)
     * @var type string
     */
    public $url;

  function get_images() {
        $this->db->select('url');
        $this->db->from('images');
        $query = $this->db->get();
        return $result = $query->result();
    }


}
