<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    if (!isset($_SESSION['os_user'])) {
      redirect('login');
    }
    $this->load->model('customer/Order_model', 'order');
  }

  /**
   * index
   */
  public function index()
  {
    $data = [
      'title'     => 'Home',
    ];
    $this->load_template_cust('order/index', $data, true);
  }

  public function detail()
  {
    $post = $this->input->post(null, true);
    if (isset($_SESSION['os_user'])) {
      $cart = $this->order->get_cart($_SESSION['os_user']['id']);
    } else {
      $cart['data'] = [];
    }

    if (count($post) == 0) {
      # code...
      $data = [
        'title'     => 'Pesanan',
        'js'        => 'order/js/core_detail',
        'cart_item' => $cart['data']
      ];
      $this->load_template_cust('order/detail', $data);
    } else {
      $this->order->insert_order($_SESSION['os_user']['id']);
      redirect('order/payment');
    }
  }

  public function payment($id)
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      # code...
      $data = [
        'title'     => 'Pembayaran',
        'js'        => 'order/js/core_payment'
      ];
      $this->load_template_cust('order/payment', $data);
    } else {
      $post['order_id'] = $id;

      // check if the image input exist
      $config = [
        'allowed_types' => '*',
        'max_size'      => '2048',
        'upload_path'   => './assets/img/payment',
        'encrypt_name'  => true,
        'remove_spaces' => true,
      ];

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $post['payment'] = null;
      } else {
        $data_image = $this->upload->data();
        $fileName   = $data_image['file_name'];
        $post['payment'] = $fileName;
      }

      $this->order->payment_order($post);
      redirect('order/confirm');
    }
  }

  public function confirm($id)
  {
    $post = $this->input->post(null, true);
    $data = $this->order->detail_order($id);

    if (count($post) == 0) {
      # code...
      $data_view = [
        'title'     => 'Pesanan 0001',
      ];
      $this->load_template_cust('order/confirm', $data_view);
    } else {
      $post['order_id'] = $id;

      // check if the image input exist
      $config = [
        'allowed_types' => '*',
        'max_size'      => '2048',
        'upload_path'   => './assets/img/payment',
        'encrypt_name'  => true,
        'remove_spaces' => true,
      ];

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $post['payment'] = null;
      } else {
        $data_image = $this->upload->data();
        $fileName   = $data_image['file_name'];
        $post['payment'] = $fileName;
      }

      $this->order->payment_order($post);
      redirect('order/confirm');
    }
  }
}
