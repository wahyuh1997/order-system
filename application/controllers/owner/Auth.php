<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
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
      'title' => 'Masuk',
      'js'    => 'owner/auth/core'
    ];
    $this->load_template_cust('owner/auth/index', $data);
  }
}
