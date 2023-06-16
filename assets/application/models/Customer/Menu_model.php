<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends MY_Model
{
    function pre_order()
    {
        $menu = $this->db->get_where('menu', ['is_available' => 0]);

        $is_preorder = $menu->num_rows() > 0 ? 1 : 0;

        $return = ['is_preorder' => $is_preorder];
        return $return;
    }

    // menu search for customer

    function get_menu_by_search($search)
    {
        $menu = $this->db->get('menu')->like('product_name', $search)->result_array();

        $return = [
            'menu' => $menu,
            $this->pre_order()
        ];

        return $this->return_success('', $return);
    }
}
