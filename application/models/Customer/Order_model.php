<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends MY_Model
{
  // Order Active
  function get_order($id_customer)
  {
    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $this->db->where(['user_customer' => $id_customer]);
    $this->db->where_in('status', [0, 2, 3, 7]);
    $this->db->order_by('id', 'DESC');
    $menu = $this->db->get('order')->result_array();

    return $this->return_success('', $menu);
  }

  // History Order
  function history_order($id_customer)
  {
    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $this->db->where(['user_customer' => $id_customer]);
    $this->db->where_not_in('status', [0, 2, 3, 7]);
    $this->db->order_by('id', 'DESC');
    $menu = $this->db->get('order')->result_array();

    return $this->return_success('', $menu);
  }

  function detail_order($order_id)
  {
    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $order = $this->db->get_where('order', ['id' => $order_id])->row_array();

    $this->db->select('a.product_name, a.price, a.item, b.description, b.image, (a.price * a.item) as price_total');
    $this->db->from('order_detail a');
    $this->db->join('menu b', 'a.menu_id = b.id');
    $this->db->where('a.pesanan_id', $order_id);
    $order_detail = $this->db->get()->result_array();

    $order['order_detail'] = $order_detail;


    return $this->return_success('', $order);
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

    $this->db->delete('cart', ['customer_id' => $customer_id]);

    $return = ['order_id' => $order_id];

    return $this->return_success('pesanan berhasil ditambahkan', $return);
  }

  // $data = [
  //     'order_id' => 
  //     'payment' => 
  // ];
  function payment_order($data)
  {

    /* 
            Cannot update the status payment if used this way, please fix it.   
        */

    $order = $this->db->get_where('order', ['id' => $data['order_id']])->row_array();

    // if ($order['status'] != 0 && ) {
    //     return $this->return_failed('Please contact Admin!', []);
    // }

    $this->db->set('status', 3);
    $this->db->set('payment', $data['payment']);
    $this->db->where(['id' => $data['order_id']]);
    $this->db->update('order');

    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $order = $this->db->get_where('order', ['id' => $data['order_id']])->row_array();

    return $this->return_success('Pembayaran berhasil!', $order);
  }

  function pickup_order($order_id)
  {
    /* 
            Cannot update the status payment if used this way, please fix it.   
        */

    $order = $this->db->get_where('order', ['id' => $order_id])->row_array();

    // if ($order['status'] != 0 && ) {
    //     return $this->return_failed('Please contact Admin!', []);
    // }

    $this->db->set('status', 1);
    $this->db->where(['id' => $order_id]);
    $this->db->update('order');

    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $order = $this->db->get_where('order', ['id' => $order_id])->row_array();

    return $this->return_success('anda telah mengambil pesanan ini !', $order);
  }

  function self_canceled($order_id)
  {

    /* 
            Cannot update the status payment if used this way, please fix it.   
        */

    $order = $this->db->get_where('order', ['id' => $order_id])->row_array();

    // if ($order['status'] != 0 && ) {
    //     return $this->return_failed('Please contact Admin!', []);
    // }

    $this->db->set('status', 6);
    $this->db->where(['id' => $order_id]);
    $this->db->update('order');

    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $order = $this->db->get_where('order', ['id' => $order_id])->row_array();

    return $this->return_success('Anda membatalkan pesanan ini !', $order);
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
