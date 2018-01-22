<?php
/***
* Blog-wide model. Used to retrieve categories in order to create the nav bar.
*/
class Blog_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_categories() {
        $query = $this->db->get('Categories');
        $categories = $query->result();
        foreach($categories as $category) {
          $query = $this->db->get_where('Subcategories', array('category_id' => $category->id));
          $category->subcategories = $query->result();
        }
        return $categories;
    }

}
