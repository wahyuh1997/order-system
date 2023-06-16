<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MY_Controller
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
    $res = $this->order->report(date('Y-m-01'), date('Y-m-d'));

    $data_view = [
      'title'     => 'Laporan Penjualan',
      'js'        => 'owner/report/core',
      'data'      => $res
    ];

    $this->load_template('owner/report/index', $data_view);
  }

  public function get_report()
  {
    $post      = $this->input->post(null, true);
    $res       = $this->order->report($post['start_date'], $post['end_date']);
    $data_item['order'] = $res['order'];
    $data_view = [
      'total_income'  => $res['total_income'],
      'order_success' => $res['order_success'],
      'total_product' => $res['total_product'],
      'order_cancel'  => $res['order_cancel'] + $res['order_failed'],
      'html'          => $this->load->view('owner/report/detail', $data_item, true)
    ];

    echo json_encode($data_view);
  }
}
