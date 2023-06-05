<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  /* Load Template Configuration */
  public function load_template_cust($view = null, $data_view = null, $footer_menu = false)
  {
    $this->load->view("template/header", $data_view);
    $this->load->view($view, $data_view);
    if ($footer_menu == true) {
      $this->load->view("template/footer_menu", $data_view);
    }
    $this->load->view("template/footer", $data_view);
    if (isset($data_view['js'])) {
      $this->load->view($data_view['js'], $data_view);
    }
  }

  public function load_template($view = null, $data_view, $footer_menu = false)
  {
    $this->load->view("template/header", $data_view);
    $this->load->view($view, $data_view);
    if ($footer_menu == true) {
      $this->load->view("template/footer_menu", $data_view);
    }
    $this->load->view("template/footer", $data_view);
    if (isset($data_view['js'])) {
      $this->load->view($data_view['js'], $data_view);
    }
  }
}
