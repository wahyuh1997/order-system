<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('owner/Menu_model', 'menu');
    $this->load->model('customer/Order_model', 'order');
  }

  /**
   * index
   */
  public function index()
  {
    $res  = $this->menu->get_all_menu(); // Get All Product

    if (isset($_SESSION['os_user'])) {
      $cart = $this->order->get_cart($_SESSION['os_user']['id']);
    } else {
      $cart['data'] = [];
    }

    $data = [
      'title'     => 'Home',
      'js'        => 'menu/core',
      'item'      => $res['data']['menu'],
      'cart_item' => $cart['data']
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

    if (isset($_SESSION['os_user'])) {
      $cart = $this->order->get_cart($_SESSION['os_user']['id']);
    } else {
      $cart['data'] = [];
    }

    $data_view['item']      = $res['data']['menu'];
    $data_view['cart_item'] = $cart['data'];

    $data = [
      'status' => $res['status'],
      'html'   => $this->load->view('menu/view_product', $data_view, true)
    ];

    echo json_encode($data);
  }

  public function load_cart()
  {
    if (isset($_SESSION['os_user'])) {
      $cart = $this->order->get_cart($_SESSION['os_user']['id']);

      if (count($cart['data']) > 0) {
        # code...
        foreach ($cart['data'] as $item) {
          $total_qty[]   = $item['item'];
          $total_price[] = $item['price'];
        }

        $cart['total_qty']   = array_sum($total_qty);
        $cart['total_price'] = array_sum($total_price);
      } else {
        $cart['status']        = false;
        $cart['total_qty']     = 0;
        $cart['total_price']   = 0;
      }
    } else {
      $cart['status']        = 'false';
      $cart['data']          = [];
      $cart['total_qty']     = 0;
      $cart['total_price']   = 0;
    }

    $data = [
      'status'      => $cart['status'],
      'total_qty'   => $cart['total_qty'],
      'total_price' => $cart['total_price'],
      'url'         => base_url('order/detail')
    ];

    echo json_encode($data);
  }

  public function add_to_cart($status = 'add')
  {
    $_POST['customer_id'] = $_SESSION['os_user']['id'];

    if ($status == 'update') {
      # Update
      echo json_encode($this->order->update_cart($_POST));
    } elseif ($status == 'delete') {
      echo json_encode($this->order->delete_cart($_POST));
    } else {
      # Add
      echo json_encode($this->order->add_cart($_POST));
    }
  }

  // public function update_cart()
  // {
  //   $post = $this->input->post(null, true);
  //   $post['customer_id'] = $_SESSION['os_user']['id'];

  //   echo json_encode($this->order->update_cart($post));
  // }
}
