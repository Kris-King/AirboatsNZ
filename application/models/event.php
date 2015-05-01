<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');


class Event extends MY_Model{
    
    
    /**
     * Unique Identifier
     * @var type int
     */
    public $id;

    /**
     * Start date of the event
     * @var type DateTime
     */
    public $start_date;

    /**
     * End date of the event
     * @var type DateTime
     */
    public $end_date;

    /**
     * Description of the event
     * @var type string
     */
    public $description;

    /**
     * Title of the event
     * @var type string
     */
    public $title;

    /**
     * City or town where the event is being held
     * @var type string
     */
    public $city_town;

    /**
     * Country where the event is being held
     * @var type string
     */
    public $country;
    
    /**
     * Foreign Key - id of the user who created an event (in this case the admin)
     * @var type int
     */
    public $user_id;
}
