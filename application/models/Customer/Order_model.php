<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends MY_Model
{
    // Order Active
    function get_order($id_customer)
    {
        $this->db->where(['user_customer' => $id_customer]);
        $this->db->where_in('status', [0, 2, 3]);
        $menu = $this->db->get('order')->result_array();

        return $this->return_success('', $menu);
    }

    // History Order
    function history_order($id_customer)
    {
        $this->db->where(['user_customer' => $id_customer]);
        $this->db->where_not_in('status', [0, 2, 3]);
        $menu = $this->db->get('order')->result_array();

        return $this->return_success('', $menu);
    }


    // add order
    function insert_order($customer_id)
    {
        $this->db->insert('order', ['user_customer' => $customer_id]);

        $order_id = $this->db->insert_id();

        $sql_insert = "
                    INSERT INTO order_detail (menu_id, pesanan_id, product_name, price, item)
                    SELECT b.id, ?, b.product_name, b.price, a.item
                    FROM cart a
                    JOIN menu b on a.menu_id = b.id
                    WHERE a.customer_id = ?;
        ";

        $this->db->query($sql_insert, [$order_id, $customer_id]);

        return $this->return_success('order is added', []);
    }

    // $data = [
    //     'order_id' => 
    //     'payment' => 
    // ];
    function payment($data)
    {
        $order = $this->db->get_where('order',['id' => $data['order_id']])->row_array();

        // if ($order['status'] != 2) {
        //     return $this->
        // }
        
    }

    // $data = [
    //     'customer_id' => 
    //     'menu_id' => 
    //      'item'  => 
    // ];


    // ================================================= cart ===============================
    function add_cart($data)
    {
        if (strlen($data['menu_id']) < 1) {
            return $this->return_failed('Please select a menu!', []);
        }

        $this->db->insert('cart', $data);

        $cart = $this->get_cart($data['customer_id'])['data'];

        return $this->return_success('Insert to cart', $cart);
    }

    // $data = [
    //     'customer_id' => 
    //     'menu_id' => 
    //      'item'  => 
    // ];

    /* 
    ITEM == QTY
    Please don't make it confused.
    */

    public function update_cart($data)
    {
        if (strlen($data['menu_id']) < 1) {
            return $this->return_failed('Please select a menu!', []);
        }

        $this->db->set('item', $data['item']);
        $this->db->where(['customer_id' => $data['customer_id'], 'menu_id' => $data['menu_id']]);
        $this->db->update('cart');

        $cart = $this->get_cart($data['customer_id'])['data'];

        return $this->return_success('cart is updated', $cart);
    }

    // $data = [
    //     'customer_id' => 
    //     'menu_id' =>
    // ];
    function delete_cart($data)
    {
        $this->db->where(['customer_id' => $data['customer_id'], 'menu_id' => $data['menu_id']]);
        $this->db->delete('cart');

        $cart = $this->get_cart($data['customer_id'])['data'];

        return $this->return_success('item is deleted!', $cart);
    }

    function get_cart($customer_id)
    {
        $this->db->select('a.*, b.product_name, b.description, b.price, b.image');
        $this->db->where('customer_id', $customer_id);
        $this->db->from('cart a');
        $this->db->join('menu b', 'a.menu_id = b.id');
        $cart = $this->db->get()->result_array();

        return $this->return_success('', $cart);
    }
}
