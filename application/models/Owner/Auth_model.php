<?php

class Auth_model extends MY_Model
{
  function __construct()
  {
    parent::__construct();
  }

  /*
    $data = [
    'user_name' => ,
    'password'
    ];
    */
  function login($data)
  {
    $data_user = $this->db->get_where('user', ['user_name' => $data['user_name'], 'is_admin' => 1])->row_array();

    if ($data_user !== NULL) {
      //cek password
      if ($data['password'] == $data_user['password']) {
        return $this->return_success('login berhasil!', $data_user);
      } else {
        return $this->return_failed('password salah', []);
      }
    } else {
      return $this->return_failed('user tidak ditemukan', []);
    }
  }

  /*
    $data = [
    'user_name' => ,
    'nama' => ,
    'password' => ,
    'photo' => ,
    ];
    */

  function register($data)
  {
    if (strlen($data['user_name']) < 1 || strlen($data['nama']) < 1 || strlen($data['password']) < 1) {
      return $this->return_failed('username, nama, dan password silahkan diisi!', []);
    }

    if ($this->db->get_where('user', ['user_name' => $data['user_name']])->row_array()) {
      return $this->return_failed('username sudah digunakan!', []);
    }

    $simpan = $this->db->insert('user', $data);

    return $this->return_success('Data berhasil disimpan!', $simpan);
  }
  
  /*
    $data = [
    'id'=>
    'user_name' => ,
    'nama' => ,
    'password' => ,
    'photo' => ,
    ];
    */
  function edit_user($data)
  {
    $user = $this->db->get_where('user', ['id' => $data['id']])->row_array();

    if (count($user) < 1) {
        return $this->return_failed('User is not available!', []);
    }

    if (strlen($data['user_name']) < 1) {
      return $this->return_failed('username is required!', []);
    }
    
    if (strlen($data['nama']) < 1) {
      return $this->return_failed('nama is required!', []);
    }
    if ($this->db->get_where('user', ['user_name' => $data['user_name']])->row_array()) {
      return $this->return_failed('username sudah digunakan!', []);
    }

    if (strlen($data['password']) < 1) {
      $this->db->set('password', $data['password']);
    }
    if (strlen($data['photo']) < 1) {
      $this->db->set('photo', $data['photo']);
    }

    $this->db->set('user_name', $data['user_name']);
    $this->db->set('nama', $data['nama']);

    $simpan = $this->db->update('user', ['id'=>$data['id']]);

    return $this->return_success('Data berhasil diubah!', $simpan);
  }
}
