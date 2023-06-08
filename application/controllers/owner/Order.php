<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller
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
      'title'     => 'Pesanan',
    ];
    $this->load_template('owner/order/index', $data);
  }

  public function detail()
  {
    $data = [
      'title'     => 'Pesanan 0001',
    ];
    $this->load_template('owner/order/detail', $data);
  }
}
