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
    $this->load->model('Customer/Auth_model', 'auth');
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
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      # code...
      $data = [
        'title'     => 'Ubah Profil',
      ];
      $this->load_template_cust('profile/edit', $data, true);
    } else {
      $post['id'] = $_SESSION['os_user']['id'];
      $str = $post['no_telepon'];
      preg_match_all('!\d+!', $str, $matches);
      $post['no_telepon'] = $matches[0][0] . $matches[0][1] . $matches[0][2];

      $res = $this->auth->edit_user($post);

      if ($res['status'] == true) {
        $_SESSION['os_user']['nama']  = $post['nama'];
        $_SESSION['os_user']['phone'] = $post['no_telepon'];

        // [
        //   'nama'      => $post['nama'],
        //   'phone'     => $post['no_telepon']
        // ];
      }

      echo json_encode($res);
    }
  }
}
