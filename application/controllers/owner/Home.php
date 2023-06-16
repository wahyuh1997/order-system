<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
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
    $res = $this->menu->pre_order();

    $data = [
      'title'       => 'Halaman Utama',
      'is_preorder' => $res['is_preorder']
    ];
    $this->load_template('owner/home/index', $data);
  }
}
