<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('todo_model');
    }

    public function index() {
		//$this->template->css("main.css");
		$this->template->load("todo");
	}
}
