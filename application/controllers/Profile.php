<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
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
      'title'     => 'Profile',
    ];
    $this->load_template_cust('profile/index', $data, true);
  }

  public function edit()
  {
    $data = [
      'title'     => 'Ubah Profil',
    ];
    $this->load_template_cust('profile/edit', $data, true);
  }
}
