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
            return $this->return_success('Must Registered!',[]);
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
        $this->db->insert('user', $data);
        $user = $this->db->get_where('user', ['email' => $data['email']]);
        return $this->return_success('User has been registered!', $user);
    }
}