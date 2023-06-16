<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_produk extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Owner/Order_model', 'order');
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->order->menu_order();

    if ($res['status']) {
      # code...
      $data_view = [
        'title'     => 'List Produk Pesanan',
        'data'      => $res['data']
      ];
      $this->load_template('owner/list_produk/index', $data_view);
    } else {
      redirect('owner');
    }
  }

  public function detail($menu_id)
  {
    $res = $this->order->get_order_by_menu($menu_id);

    $data = [
      'title'     => $res['data']['product_name'],
      'data'      => $res['data']
      // Get From Data Item Name
    ];
    $this->load_template('owner/list_produk/detail', $data);
  }
}
