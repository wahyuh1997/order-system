<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller
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
    $res = $this->menu->get_all_menu(); // Get All Product
    // $cart = 

    $data = [
      'title' => 'Home',
      'js'    => 'menu/core',
      'item'  => $res['data']['menu']
    ];
    $this->load_template_cust('menu/index', $data, true);
  }

  public function search($product_name = null)
  {
    if ($product_name == null) {
      $res = $this->menu->get_all_menu();
    } else {
      $res = $this->menu->get_menu_by_search($product_name);
    }
    $data_view['item'] = $res['data']['menu'];

    $data = [
      'status' => $res['status'],
      'html'   => $this->load->view('menu/view_product', $data_view, true)
    ];

    echo json_encode($data);
  }
}
