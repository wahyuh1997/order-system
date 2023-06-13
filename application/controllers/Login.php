<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();
    $this->load->model('customer/Auth_model', 'auth');
  }

  public function index()
  {
    include_once APPPATH . "../vendor/autoload.php";
    $google_client = new Google_Client();

    $google_client->setClientId('385275097963-7bq9u4m7bog2rkjtmq9356344a90f96u.apps.googleusercontent.com'); //masukkan ClientID anda 
    $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
    $google_client->setRedirectUri('http://localhost/order-system/login'); //Masukkan Redirect Uri anda
    $google_client->addScope('email');
    $google_client->addScope('profile');

    if (isset($_GET["code"])) {
      $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

      if (!isset($token["error"])) {
        $google_client->setAccessToken($token['access_token']);
        $this->session->set_userdata('access_token', $token['access_token']);
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();

        $current_datetime = date('Y-m-d H:i:s');

        $res = $this->auth->login($data['email']);

        if ($res['status'] == true) {
          $_SESSION['os_user'] = [
            'id'         => $res['data']['id'],
            'email'      => $res['data']['email'],
            'nama'       => $res['data']['nama'],
            'picture'    => $res['data']['photo'],
            'phone'      => $res['data']['no_telepon']
          ];

          redirect();
        } else {
          # code...
          $_SESSION['os_gmail'] = [
            'first_name'      => $data['given_name'],
            'last_name'       => $data['family_name'],
            'email_address'   => $data['email'],
            'profile_picture' => $data['picture'],
            'updated_at'      => $current_datetime
          ];

          redirect('login/insert_phone');
        }
      }
    }
    $data_view = [
      'title'      => 'Login',
      'google_url' => $google_client->createAuthUrl()
    ];

    $this->load_template_cust('login/index', $data_view);
    // if (!$this->session->userdata('access_token')) {

    // } else {
    //   echo "<pre>";
    //   var_dump($_SESSION['user_data']);
    //   exit();
    //   // uncomentar kode dibawah untuk melihat data session email
    //   // echo json_encode($this->session->userdata('access_token')); 
    //   // echo json_encode($this->session->userdata('user_data'));
    //   echo "Login success";
    // }
  }

  public function insert_phone()
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      # code...
      $data_view = [
        'title'      => 'Login',
        'js'         => 'login/js/core_phone'
      ];

      $this->load_template_cust('login/phone', $data_view);
    } else {
      $post['email'] = $_SESSION['os_gmail']['email_address'];
      $post['nama']  = $_SESSION['os_gmail']['first_name'] . ' ' . $_SESSION['os_gmail']['last_name'];
      $post['photo'] = $_SESSION['os_gmail']['profile_picture'];

      $str = $post['no_telepon'];
      preg_match_all('!\d+!', $str, $matches);
      $post['no_telepon'] = $matches[0][0] . $matches[0][1] . $matches[0][2];

      $res = $this->auth->register($post);

      if ($res['status'] == true) {
        $res = $this->auth->login($_SESSION['os_gmail']['email_address']);

        $_SESSION['os_user'] = [
          'id'         => $res['data']['id'],
          'email'      => $_SESSION['os_gmail']['email_address'],
          'nama'       => $_SESSION['os_gmail']['first_name'] . ' ' . $_SESSION['os_gmail']['last_name'],
          'picture'    => $_SESSION['os_gmail']['profile_picture'],
          'phone'      => $post['no_telepon']
        ];

        unset($_SESSION['os_gmail']);
      }
      echo json_encode($res);
    }
  }

  public function logout()
  {
    session_destroy();
    redirect();
  }
}
