<?php

class Auth_model extends My_Model
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

    if($data_user !== NULL)
		{
			//cek password
			if(password_verify($data['password'], $data_user['password']))
			{
				return return_success('login berhasil!', $data_user);
			}
			else
			{
				return return_failed('password salah', []);
			}
		}
		else
		{
			return return_failed('user tidak ditemukan', []);
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
        return $this->return_failed('username, nama, dan password silahkan diisi!',[]);
    }

    if ($this->db->get_where('user', ['user_name' => $data['user_name']])->row_array()) {
        return $this->return_failed('username sudah digunakan!',[]);
    }

    $simpan = $this->db->insert('user', $data);

    return $this->return_success('Data berhasil disimpan!', $simpan);
  }
}
