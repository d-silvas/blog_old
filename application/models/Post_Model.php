<?php
class Post_model extends CI_Model {

    private $img_formats = [".jpeg", ".png", ",jpg", ".gif"];

    public function __construct() {
        parent::__construct();
    }

    public function get_post($post_id) {
        $query = $this->db->get_where('Posts', array('id' => $post_id));
        return $query->result()[0];
    }

    public function get_last ($number = 5) {
        $posts = new \stdClass;
        $sql = "
            SELECT P.*, C.name AS category_name
            FROM posts P
            JOIN subcategories S ON P.subcategory = S.id
            JOIN categories C ON S.category_id = C.id
            ORDER BY date DESC
            LIMIT " . $number . "
        ";
        $query = $this->db->query($sql);
        $posts = $query->result();

        foreach ($posts as $post) {
            $post->img = $this->get_post_img($post->id);
        }
    
        return $posts;
    }

    private function get_post_img($id) {
        foreach ($this->img_formats as $format) {
            $img_path = FCPATH . "assets" . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR . "main" . DIRECTORY_SEPARATOR . $id . $format;
            if (file_exists($img_path)) {
                return base_url("assets/images/main/" . $id . $format);
            }
        }
        return NULL;
    }

}
