<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends MY_Model
{
    // Order Active
    function get_order()
    {
        $this->db->where_in('status', [0, 2, 3]);
        $menu = $this->db->get('order')->result_array();

        return $this->return_success('', $menu);
    }

    // History Order
    function history_order()
    {
        $this->db->where_not_in('status', [0, 2, 3]);
        $menu = $this->db->get('order')->result_array();

        return $this->return_success('', $menu);
    }

    function detail_order($order_id)
    {
        $order = $this->db->get_where('order',['id' => $data['order_id']])->row_array();

        return $this->return_success('', $order);
    }

    // $data = [
    //     'order_id' => 
    // ];

    function accept_order($data)
    {
        $order = $this->db->get_where('order',['id' => $data['order_id']])->row_array();

        if ($order['status'] != 3) {
            return $this->return_failed('Order not Accepted',[]);
        }

        $this->db->set('status' , 2);
        $this->db->where(['id' => $order['id']]);
        $this->db->update('order');

        $order = $this->db->get_where('order',['id' => $data['order_id']])->row_array();

        return $this->return_success('Order is Accepted!', $order);
    }
    
    // $data = [
    //     'order_id' => 
    // ];

    function reject_order($data)
    {
        $order = $this->db->get_where('order',['id' => $data['order_id']])->row_array();

        if ($order['status'] != 0) {
            return $this->return_failed('Order is not rejected',[]);
        }

        $this->db->set('status' , 4);
        $this->db->where(['id' => $order['id']]);
        $this->db->update('order');

        $order = $this->db->get_where('order',['id' => $data['order_id']])->row_array();

        return $this->return_success('Order is Rejected!', $order);
    }
    
    // $data = [
    //     'order_id' => 
    // ];

    function final_order($data)
    {
        $order = $this->db->get_where('order',['id' => $data['order_id']])->row_array();

        if ($order['status'] != 3) {
            return $this->return_failed('Unpaid order',[]);
        }

        $this->db->set('status' , 1);
        $this->db->where(['id' => $order['id']]);
        $this->db->update('order');

        $order = $this->db->get_where('order',['id' => $data['order_id']])->row_array();

        return $this->return_success('Order is Completed!', $order);
    }
}
