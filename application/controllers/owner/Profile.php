<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
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
      'title' => 'Data Diri',
    ];
    $this->load_template('owner/profile/index', $data);
  }

  public function edit()
  {
    $data = [
      'title' => 'Ubah Data Diri',
      'js'    => 'owner/profile/core'
    ];
    $this->load_template('owner/profile/edit', $data);
  }
}
