<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Owner/Order_model', 'order');
    $this->load->model('User_model', 'user');
  }

  /**
   * index
   */
  public function index($type = null)
  {
    /* 
        $type = ['null', 'Process', 'History']
    */

    $get_new      = $this->order->get_accept_order($_SESSION['os_owner']['id']);
    $get_process  = $this->order->get_final_order($_SESSION['os_owner']['id']);
    $get_history  = $this->order->history_order($_SESSION['os_owner']['id']);


    $data = [
      'title'         => 'Pesanan',
      'new_data'      => $get_new['data'],
      'process_data'  => $get_process['data'],
      'history_data'  => $get_history['data'],
      'type'          => $type,
      'js'            => 'owner/order/js/core_index'
    ];
    $this->load_template('owner/order/index', $data);
  }

  public function detail($order_id)
  {
    $res  = $this->order->detail_order($order_id);
    $user = $this->user->get_detail_user($res['data']['user_customer']);
    $post = $this->input->post();

    if (count($post) == 0) {
      # code...
      $data_view = [
        'title'     => 'Pesanan ' . $res['data']['order_number'],
        'data'      => $res['data'],
        'user'      => $user['data'],
        'js'        => 'owner/order/js/core'
      ];
      $this->load_template('owner/order/detail', $data_view);
    } else {
      if ($post['type'] == 'confirm') {
        $res  = $this->order->accept_order($post);
      } elseif ($post['type'] == 'cancel') {
        $res  = $this->order->reject_order($post);
      } else {
        $res  = $this->order->final_order($post);
      }

      echo json_encode($res);
    }
  }

  public function delete($id)
  {
    $res = $this->order->delete_order($id);
    echo json_encode($res);
  }
}
