<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends MY_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function login($email)
  {
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      return $this->return_success('Login success!', $user);
    } else {
      return $this->return_failed('Must Registered!', []);
    }
  }

  /*
    $data = [
    'email'=>
    'nama' => ,
    'photo' => ,
    'no_telepon' => ,
    ];
    */
  function register($data)
  {
    $data['is_admin'] = 0;

    $user = $this->db->get_where('user', ['email' => $data['email']])->row_array();
    if ($user) {
      return $this->return_failed('User has been registered!', $user);
    }
    $this->db->insert('user', $data);
    $user = $this->db->get_where('user', ['email' => $data['email']])->row_array();
    return $this->return_success('User has been registered!', $user);
  }

  function edit_user($data)
  {
    $user = $this->db->get_where('user', ['id' => $data['id']])->row_array();

    if (count($user) < 1) {
      return $this->return_failed('User is not available!', []);
    }

    if (strlen($data['nama']) < 1) {
      return $this->return_failed('nama is required!', []);
    }


    $this->db->set('nama', $data['nama']);
    $this->db->set('no_telepon', $data['no_telepon']); // For WhatsApp Call Setting. 

    $this->db->where(['id' => $data['id']]);
    $simpan = $this->db->update('user');

    return $this->return_success('Data berhasil diubah!', $simpan);
  }
}
