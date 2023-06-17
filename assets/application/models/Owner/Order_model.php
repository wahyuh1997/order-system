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
    $this->db->order_by('id', 'DESC');
    $menu = $this->db->get('order')->result_array();

    return $this->return_success('', $menu);
  }

  function get_accept_order()
  {
    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $this->db->where_in('status', [0, 3]);
    $this->db->order_by('id', 'DESC');
    $menu = $this->db->get('order')->result_array();

    return $this->return_success('', $menu);
  }

  // History Order
  function history_order()
  {
    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $this->db->where_in('status', [1, 4, 5]);
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

  // $data = [
  //     'order_id' => 
  // ];

  function accept_order($data)
  {
    $order = $this->db->get_where('order', ['id' => $data['order_id']])->row_array();

    if ($order['status'] != 3) {
      return $this->return_failed('Order not Accepted', []);
    }

    $this->db->set('status', 2);
    $this->db->where(['id' => $order['id']]);
    $this->db->update('order');

    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $order = $this->db->get_where('order', ['id' => $data['order_id']])->row_array();

    return $this->return_success('Order is Accepted!', $order);
  }

  // $data = [
  //     'order_id' => 
  // ];

  function reject_order($data)
  {
    $order = $this->db->get_where('order', ['id' => $data['order_id']])->row_array();

    /* 
            Please Fix it !
        */
    // if ($order['status'] != 0) {
    //     return $this->return_failed('Order is not rejected', []);
    // }

    $this->db->set('status', 4);
    $this->db->where(['id' => $order['id']]);
    $this->db->update('order');

    $this->db->select("*, LPAD(id, 4, '0') as order_number");
    $order = $this->db->get_where('order', ['id' => $data['order_id']])->row_array();

    return $this->return_success('Order is Rejected!', $order);
  }

  // $data = [
  //     'order_id' => 
  // ];

  function final_order($data)
  {
    $order = $this->db->get_where('order', ['id' => $data['order_id']])->row_array();

    if ($order['status'] == 2) {

      $this->db->set('status', 1);
      $this->db->where(['id' => $order['id']]);
      $this->db->update('order');

      $this->db->select("*, LPAD(id, 4, '0') as order_number");
      $order = $this->db->get_where('order', ['id' => $data['order_id']])->row_array();

      return $this->return_success('Order is Completed!', $order);
    } else {
      return $this->return_failed('Unpaid order', []);
    }
  }

  // Menu Order
  function menu_order()
  {
    $pre_order = $this->menu_owner->pre_order();

    $sql = "
            select a.id as menu_id, a.product_name, a.description, SUM(b.item) as item, a.image
            from menu a 
            join order_detail b on a.id = b.menu_id
            join `order` c on b.pesanan_id =c.id
            where c.status = 3
            GROUP BY a.id
            ";
    $menu = $this->db->query($sql)->result_array();

    $return = [
      'is_preorder' => $pre_order['is_preorder'],
      'menu'        => $menu
    ];

    return $this->return_success('', $return);
  }

  function get_order_by_menu($menu_id)
  {
    $pre_order = $this->menu_owner->pre_order();

    $sql = "
                select d.nama, a.product_name, c.id as order_id, SUM(item) as item, LPAD(c.id, 4, '0') as order_number
                from menu a 
                join order_detail b on a.id = b.menu_id
                join `order` c on b.pesanan_id =c.id
                join user d on c.user_customer = d.id
                where c.status = 3 and a.id = ?
                GROUP BY c.user_customer
        ";
    $user = $this->db->query($sql, [$menu_id])->result_array();

	$menu = $this->db->get_where('menu', ['id' => $menu_id])->row_array();


    $return = [
      'pre_order'     => $pre_order['is_preorder'],
	'product_name'		=> $menu['product_name'],
      'user'          => $user
    ];

    return $this->return_success('', $return);
  }

  // $data = [
  //         'date1' => '2023-06-01',
  //         'date2' => '2023-06-01'
  //     ];
  function report($start_date, $end_date)
  {
    $return = [
      'order_success' => "0",
      'order_failed' => "0",
      'total_income' => "0",
      'total_product' => "0",
      'order' => [],
    ];

    // category order
    $sql_status = "select status, count(status) amount from `order`
                        where status in (1,4)
                        and date between ? and ?
                        group by status;";
    $amount_category_order = $this->db->query($sql_status, [$start_date, $end_date])->result_array();

    foreach ($amount_category_order as $ctr) {
      if ($ctr['status'] == 1) {
        $return['order_success'] = $ctr['amount'] ? $ctr['amount'] : 0;
      } else if ($ctr['status'] == 4) {
        $return['order_cancel'] = $ctr['amount'] ? $ctr['amount'] : 0;
      }
    }

    // sum income
    $sql_income = "select sum(b.item*b.price) as total_income, sum(item) as total_product
                        from `order` a
                        join order_detail b on a.id = b.pesanan_id
                        where status = 1
												and a.date between ? and ?;";
    $income = $this->db->query($sql_income, [$start_date, $end_date])->row_array();

    $return['total_income'] = $income['total_income'];
    $return['total_product'] = $income['total_product'];

    $sql_order = "select a.id as order_id, LPAD(a.id, 4, '0') as order_number, c.nama, a.date, a.status, sum(b.item*b.price) as total_price
                        from `order` a
                        join order_detail b on a.id = b.pesanan_id
                        join user c on a.user_customer = c.id
                        where a.status in (1,4)
                        and date between ? and ?
                        group by a.id ;";
    $order = $this->db->query($sql_order, [$start_date, $end_date])->result_array();

    $return['order'] = $order;

    return $return;
  }
}