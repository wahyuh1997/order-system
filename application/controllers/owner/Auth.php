<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('owner/Auth_model', 'auth');
  }

  /**
   * index
   */
  public function index()
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      # code...
      $data = [
        'title' => 'Masuk',
        'js'    => 'owner/auth/core'
      ];
      $this->load_template('owner/auth/index', $data);
    } else {
      $res = $this->auth->login($post);

      if ($res['status'] == true) {
        $_SESSION['os_owner'] = [
          'id'        => $res['data']['id'],
          'username'  => $res['data']['user_name'],
          'nama'      => $res['data']['nama'],
          'email'     => $res['data']['email'],
          'phone'     => $res['data']['no_telepon'],
        ];

        $this->session->set_flashdata('alert-login', $res['message']);
        redirect('owner');
      } else {
        $this->session->set_flashdata('alert-failed', $res['message']);
        redirect('owner/auth');
      }

      // echo json_encode($res);
    }
  }

  public function logout()
  {
    session_destroy();
    redirect('owner/auth');
  }
}
