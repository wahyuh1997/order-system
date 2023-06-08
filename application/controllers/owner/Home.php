<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
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
      'title'     => 'Halaman Utama',
    ];
    $this->load_template('owner/home/index', $data);
  }
}
