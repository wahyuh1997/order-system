<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Owner/Auth_model', 'auth');
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
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      # View
      $data = [
        'title' => 'Ubah Data Diri',
        'js'    => 'owner/profile/core'
      ];
      $this->load_template('owner/profile/edit', $data);
    } else {

      $post['id'] = $_SESSION['os_owner']['id'];
      $str = $post['no_telepon'];
      preg_match_all('!\d+!', $str, $matches);
      $post['no_telepon'] = $matches[0][0] . $matches[0][1] . $matches[0][2];

      $res = $this->auth->edit_user($post);

      if ($res['status'] == true) {
        $_SESSION['os_owner']['username']  = $post['user_name'];
        $_SESSION['os_owner']['nama']      = $post['nama'];
        $_SESSION['os_owner']['phone']     = $post['no_telepon'];
      }

      echo json_encode($res);
    }
  }
}
