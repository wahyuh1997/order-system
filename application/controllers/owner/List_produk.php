<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_produk extends MY_Controller
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
      'title'     => 'List Produk Pesanan',
    ];
    $this->load_template_cust('owner/list_produk/index', $data);
  }

  public function detail()
  {
    $data = [
      'title'     => 'Donat Coklat', // Get From Data Item Name
    ];
    $this->load_template_cust('owner/list_produk/detail', $data);
  }
}
