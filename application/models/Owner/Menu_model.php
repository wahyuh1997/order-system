<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends My_Model
{
    function pre_order()
    {
        $menu = $this->db->get_where('menu',['is_available' => 0]);

        $is_preorder = $menu->num_rows() > 0 ? 1 : 0;

        $return = ['is_preorder' => $is_preorder];
        return $return;
    }

    function get_all_menu()
    {
        $menu = $this->db->get('menu')->result_array();

        $return = [
            'menu' => $menu,
            $this->pre_order()
        ];

        return return_success('',$return);
    }

    // untuk menu detail, edit menu

    function get_menu($id_menu)
    {
        $menu = $this->db->get_where('menu',['id' => $id_menu])->row_array();

        if(count($menu) < 1)
        {
            return return_failed('Menu is not available!', []);
        }

        return return_success('',$menu);
    }


    // $data = [
    //     'product_name',
    //     'description',
    //     'price',
    //     'is_available' => 
    // ]
    function insert_menu()
    {
        if (strlen($data['product_name']) < 1 || strlen($data['description']) < 1 || strlen($data['price']) < 1) {
            return $this->return_failed('Nama menu, deskripsi, dan harga silahkan diisi!',[]);
        }

        $simpan = $this->db->insert('menu', $data);

    return $this->return_success('Menu berhasil disimpan!', $data);
    }
}