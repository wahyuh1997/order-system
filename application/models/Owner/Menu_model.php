<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends MY_Model
{
    function pre_order()
    {
        $menu = $this->db->get_where('menu', ['is_available' => 1]);

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

        return $this->return_success('', $return);
    }
    
    function get_menu_by_search($search)
    {
        $menu = $this->db->get('menu')->like('product_name',$search)->result_array();

        $return = [
            'menu' => $menu,
            $this->pre_order()
        ];

        return return_success('',$return);
    }

    // untuk menu detail, edit menu

    function get_menu($id_menu)
    {
        $menu = $this->db->get_where('menu', ['id' => $id_menu])->row_array();

        if (count($menu) < 1) {
            return $this->return_failed('Menu is not available!', []);
        }

        return $this->return_success('', $menu);
    }

    // $data = [
    //  'id',
    //     'product_name',
    //     'description',
    //     'price',
    //     'image' =>, 
    //     'is_available' => 
    // ]
    
    function edit_menu($data)
    {
        $menu = $this->db->get_where('menu', ['id' => $data['id']])->row_array();

        if (count($menu) < 1) {
            return $this->return_failed('Menu is not available!', []);
        }
        
        if (strlen($data['product_name'] < 1)) {
            return $this->return_failed('Menu Name must required!', []);
        }
        
        $this->db->set('product_name', $data['product_name']);
        $this->db->set('description', $data['description']);
        $this->db->set('price', $data['price']);
        $this->db->set('is_available', $data['is_available']);
        $this->db->set('image', $data['image']);
        $this->db->where(['id' => $data['id']]);
        $this->db->update('menu');

        $menu = $this->db->get_where('menu', ['id' => $data['id']])->row_array();

        return $this->return_success('Menu is Updated', $menu);
    }

    function delete_menu($id_menu)
    {
        $menu = $this->db->get_where('menu', ['id' => $id_menu])->row_array();

        if (count($menu) < 1) {
            return $this->return_failed('Menu is not available!', []);
        }

        $this->db->delete('menu',['id'=>$id_menu]);

        return $this->return_success('Menu is deleted', $menu);
    }

    // $data = ['id' => , 'is_activate'];
    function activate_menu($data)
    {
        $menu = $this->db->get_where('menu', ['id' => $data['id']])->row_array();
        
        if (count($menu) < 1) {
            return $this->return_failed('Menu is not available!', []);
        }

        $this->db->update('menu',['is_activate'=>$data['is_activate']], ['id'=>$data['id']]);

        if ($data['is_activate'] == 1) {
            return $this->return_success('Menu is activate', $menu);
        } else {
            return $this->return_success('Menu is not activate', $menu);
        }
    }


    // $data = [
    //     'product_name',
    //     'description',
    //     'price',
    //     'is_available' => ,
    //     'image'
    // ]
    function insert_menu($data)
    {
        if (strlen($data['product_name']) < 1 || strlen($data['description']) < 1 || strlen($data['price']) < 1) {
            return $this->return_failed('Nama menu, deskripsi, dan harga silahkan diisi!', []);
        }

        $this->db->insert('menu', $data);

        return $this->return_success('Menu berhasil disimpan!', $data);
    }
}
