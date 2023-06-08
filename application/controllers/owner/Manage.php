<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('owner/Menu_model', 'menu');
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->menu->get_all_menu();

    $data = [
      'title' => 'Pre-Order Management',
      'js'    => 'owner/manage/core',
      'item'  => $res['data']['menu']
    ];
    $this->load_template('owner/manage/index', $data);
  }
}
