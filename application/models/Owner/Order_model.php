<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Owner/Menu_model', 'menu_owner');
    }

    // Order Active
    function get_final_order()
    {
        $this->db->select("*, LPAD(id, 4, '0') as order_number");
        $this->db->where('status', 2);
        $menu = $this->db->get('order')->result_array();

        return $this->return_success('', $menu);
    }
    
    function get_accept_order()
    {
        $this->db->select("*, LPAD(id, 4, '0') as order_number");
        $this->db->where_in('status', [0, 3]);
        $menu = $this->db->get('order')->result_array();

        return $this->return_success('', $menu);
    }    

    // History Order
    function history_order()
    {
        $this->db->select("*, LPAD(id, 4, '0') as order_number");
        $this->db->where_in('status', [1, 4, 5]);
        $menu = $this->db->get('order')->result_array();

        return $this->return_success('', $menu);
    }

    function detail_order($order_id)
    {
        $this->db->select("*, LPAD(id, 4, '0') as order_number");
        $order = $this->db->get_where('order',['id' => $order_id])->row_array();

        $this->db->select('a.product_name, a.price, a.item, b.description, b.image, (a.price * a.item) as price_total');
        $this->db->from('order_detail a');
        $this->db->join('menu b', 'a.menu_id = b.id');
        $this->db->where('a.pesanan_id', $order_id);
        $order_detail = $this->db->get()->result_array();

        $order['order_detail'] = $order_detail;

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

        $this->db->select("*, LPAD(id, 4, '0') as order_number");
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

        $this->db->select("*, LPAD(id, 4, '0') as order_number");
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

        $this->db->select("*, LPAD(id, 4, '0') as order_number");
        $order = $this->db->get_where('order',['id' => $data['order_id']])->row_array();

        return $this->return_success('Order is Completed!', $order);
    }

    // Menu Order
    function menu_order()
    {
        $pre_order = $this->menu_owner->pre_order();

        $sql = "
                select a.id as menu_id, a.product_name, a.description, SUM(b.item)
                from menu a 
                join order_detail b on a.id = b.menu_id
                join order c on a.pesanan_id =c.id
                where c.status = 3
                GROUP BY a.id
            ";
        $menu = $this->db->query($sql)->result_array();

        $return = [
            'pre_order' => $pre_order,
            'menu' => $menu
        ];

        return $this->return_success('', $return);
    }
}
