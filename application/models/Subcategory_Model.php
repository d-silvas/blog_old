<?php
class Subcategory_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_subcategory_posts($subcat_id) {
      $query = $this->db->get_where('Posts', array('subcategory' => $subcat_id));
      return $query->result();
    }

    public function get_subcategory_details($subcat_id) {
      $this->db->select('name, description, img');
      $query = $this->db->get_where('Subcategories', array('id' => $subcat_id));
      return $query->result()[0];
    }
}
