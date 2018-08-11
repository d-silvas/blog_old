<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Post_Model");
	}

	public function index() {
		$data["name"] = "";
		$data["categories"] = $this->Blog_Model->get_categories();
		$data["last_posts"] = $this->Post_Model->get_last(3);
		$this->template->css("home.css");
		$this->template->load("home", $data);
	}
}
