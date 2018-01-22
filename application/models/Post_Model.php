<?php
class Post_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_post($post_id) {
        $query = $this->db->get_where('Posts', array('id' => $post_id));
        return $query->result()[0];
    }

}
