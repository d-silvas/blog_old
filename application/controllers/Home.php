<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data["name"] = "PEPITO";
		$data["categories"] = $this->Blog_Model->get_categories();
		$this->template->css("home.css");
		$this->template->load("home", $data);
	}
}
