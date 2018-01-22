<?php

/**
 * Created by Davidico.
 * User: David
 * Date: 7/15/2017
 * Time: 5:15 PM
 */
class Todo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function get_roadmap() {
        $query = $this->db->get('roadmap');
    }

}