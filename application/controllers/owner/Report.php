<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MY_Controller
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
      'title'     => 'Laporan Penjualan',
      'js'        => 'owner/report/core'
    ];
    $this->load_template('owner/report/index', $data);
  }
}
