<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Subcategory_Model');
	}

	public function index($subcat_id = 0) {
		$data['categories'] = $this->Blog_Model->get_categories();
		$data['subcategory'] = $this->Subcategory_Model->get_subcategory_details($subcat_id);
		$data['subcat_id'] = $subcat_id;
		$this->template->css(DATATABLES_CSS);
		// COMMON JS TO BE INCLUDED BY DEFAULT IN TEMPLATE LIBRARY
		$this->template->js([DATATABLES_JS, 'common.js', 'subcategory.js']);
		$this->template->load('subcategory', $data);
	}

	public function get_subcategory_posts($subcat_id = 0) {
		header('Content-Type: application/json');
		echo json_encode($this->Subcategory_Model->get_subcategory_posts($subcat_id));
	}
}
