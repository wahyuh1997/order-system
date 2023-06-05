<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
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
      'title'     => 'Data Produk',
    ];
    $this->load_template_cust('owner/product/index', $data);
  }

  public function detail()
  {
    $data = [
      'title'     => 'Donat Coklat', // Get From Data Item Name
    ];
    $this->load_template_cust('owner/product/detail', $data);
  }
}
