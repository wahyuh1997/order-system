<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends MY_Controller
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
      'title' => 'Pre-Order Management',
      'js'    => 'owner/manage/core'
    ];
    $this->load_template('owner/manage/index', $data);
  }
}
