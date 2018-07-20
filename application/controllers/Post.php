<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Post_Model');
	}

	public function index($post_id = null) {
		$data['categories'] = $this->Blog_Model->get_categories();
		$data['post'] = $this->Post_Model->get_post($post_id);
		//$this->template->css("main.css");
		$this->template->js([PRISM_JS, 'common.js']);
		$this->template->css([PRISM_CSS, 'post.css']);
		$this->template->load('post', $data);
	}

	public function working_on() {
		if (ENVIRONMENT === 'development') {
			$data['categories'] = $this->Blog_Model->get_categories();
			$this->template->js([PRISM_JS, 'common.js']);
			$this->template->css([PRISM_CSS, 'post.css']);
			$data['post'] = new stdClass();
			$data['post']->id = -1;
			$data['post']->title = "New Post";
			$data['post']->content = $this->load->view("working_on", null, true);
			$this->template->load('post', $data);
		} else {
			show_404();
		}
	}
}
