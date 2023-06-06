<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * index
   */
  public function index()
  {
    $data = [
      'title' => 'Home',
      'js'    => 'menu/core',
    ];
    $this->load_template_cust('menu/index', $data, true);
  }
}
