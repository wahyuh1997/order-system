<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

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

        $_SESSION['os_user'] = [
          'first_name'      => $data['given_name'],
          'last_name'       => $data['family_name'],
          'email_address'   => $data['email'],
          'profile_picture' => $data['picture'],
          'updated_at'      => $current_datetime
        ];

        redirect();
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
    $data_view = [
      'title'      => 'Login',
    ];

    $this->load_template_cust('login/phone', $data_view);
  }
}
