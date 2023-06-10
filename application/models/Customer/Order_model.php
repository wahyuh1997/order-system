<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends MY_Model
{
    // Order Active
    function get_order($id_customer)
    {
        $this->db->where(['user_customer' => $id_customer]);
        $this->db->where_in('status', [0,2,3]);
        $menu = $this->db->get('order')->result_array();

        return $this->return_success('', $menu);
    }
    
    // History Order
    function history_order($id_customer)
    {
        $this->db->where(['user_customer' => $id_customer]);
        $this->db->where_not_in('status', [0,2,3]);
        $menu = $this->db->get('order')->result_array();

        return $this->return_success('', $menu);
    }

    function insert_order($data)
    {
        
    }
}