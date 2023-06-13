<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_detail_user($user_id)
    {
        $user = $this->db->get_where('user',['id' => $user_id])->row_array();

        return $this->return_success('',$user);
    }
}