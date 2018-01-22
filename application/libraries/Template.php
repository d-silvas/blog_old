<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Template {
  public $ci;
  public $css = array();
  public $js  = array();

  private $header_php = "../views/templates/header.php";
  private $footer_php = "../views/templates/footer.php";

  public function __construct() {
    $this->ci =& get_instance();
  }

  public function css ($css = []) {
    if (!is_array($css)) {
      $this->css = array($this->add_css_path($css));
    } else if (count($css) != 0) {
      $this->css = array_map(array($this, "add_css_path"), $css);
    }
  }

  public function js ($js = []) {
    if (!is_array($js)) {
      $this->js = array($this->add_js_path($js));
    } else if (count($js) != 0) {
      $this->js = array_map(array($this, "add_js_path"),$js);
    }
  }

  public function load ($views = [], $data = null) {
    // Get categories from the controller. Needed for the navbar
    if (isset($data["categories"])) {
      $categories = $data["categories"];
      unset($data["categories"]);
    } else {
      $categories = [];
    }
    //CSS
    $this->ci->load->view($this->header_php, array(
      "css" => $this->css,
      "categories" => $categories
    ));
    //View
    if (!is_array($views) || count($views) > 0) $views = array($views);
    foreach($views as $view) {
      $this->ci->load->view("../views/".$view, $data);
    }
    //JS
    $this->ci->load->view($this->footer_php, array("js" => $this->js));
  }

  private function add_css_path($file_name) {
    return base_url("assets/css/".$file_name);
  }

  private function add_js_path($file_name) {
    return base_url("assets/js/".$file_name);
  }
}
