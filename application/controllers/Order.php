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
    $data = [
      'title'     => 'Pesanan',
    ];
    $this->load_template_cust('order/detail', $data);
  }

  public function payment()
  {
    $data = [
      'title'     => 'Pembayaran',
    ];
    $this->load_template_cust('order/payment', $data);
  }

  public function confirm()
  {
    $data = [
      'title'     => 'Pesanan 0001',
    ];
    $this->load_template_cust('order/confirm', $data);
  }
}
