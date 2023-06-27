<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Owner/Menu_model', 'menu');
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->menu->get_all_menu();

    $data = [
      'title'     => 'Data Produk',
      'js'        => 'owner/product/js/core_index',
      'item'      => $res['data']['menu']
    ];

    $this->load_template('owner/product/index', $data);
  }

  public function detail($id)
  {
    $res = $this->menu->get_menu($id);

    if ($res['status'] == true) {
      # code...
      $data = [
        'title'     => $res['data']['product_name'], // Get From Data Item Name
        'data'      => $res['data']
      ];
      $this->load_template('owner/product/detail', $data);
    } else {
      redirect('owner/product');
    }
  }

  public function add()
  {
    $post = $this->input->post(null, true);

    if (count($post) == 0) {
      # View
      $data = [
        'title' => 'Tambah Data Produk',
        'js'    => 'owner/product/js/core'
      ];
      $this->load_template('owner/product/add', $data);
    } else {
      // check if the image input exist
      $config = [
        'allowed_types' => '*',
        'max_size'      => '2048',
        'upload_path'   => './assets/img/product',
        'encrypt_name'  => true,
        'remove_spaces' => true,
      ];

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('image')) {
        $post['image'] = null;
      } else {
        $data = $this->upload->data();
        $fileName = $data['file_name'];
        $post['image'] = $fileName;
      }

      echo json_encode($this->menu->insert_menu($post));
    }
  }

  public function edit($id)
  {
    $post = $this->input->post(null, true);
    $res  = $this->menu->get_menu($id);

    if ($res['status'] == true) {
      # code...
      if (count($post) == 0) {
        # code...
        $data = [
          'title'     => 'Ubah Data Produk',
          'js'        => 'owner/product/js/core',
          'data'      => $res['data']
        ];

        $this->load_template('owner/product/edit', $data);
      } else {
        // check if the image input exist
        $post['id'] = $res['data']['id'];
        $config = [
          'allowed_types' => '*',
          'max_size'      => '2048',
          'upload_path'   => './assets/img/product',
          'encrypt_name'  => true,
          'remove_spaces' => true,
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
          if ($post['tmp_image'] == '') {
            $post['image'] = null;
          } else {
            $post['image'] = $res['data']['image'];
            # code...
          }
        } else {
          $data_image = $this->upload->data();
          $fileName = $data_image['file_name'];
          // delete the tmp image
          if ($res['data']['image'] != null) {
            # code...
            unlink('./assets/img/product/' . $res['data']['image']);
          }
          $post['image'] = $fileName;
        }

        echo json_encode($this->menu->edit_menu($post));
      }
    } else {
      redirect('owner/product');
    }
  }

  public function delete($id)
  {
    echo json_encode($this->menu->delete_menu($id));
  }

  public function search($product_name = null)
  {
    if ($product_name == null) {
      $res = $this->menu->get_all_menu();
    } else {
      $res = $this->menu->get_menu_by_search($product_name);
    }


    $data_view['item'] = $res['data']['menu'];

    $data = [
      'status' => $res['status'],
      'html'   => $this->load->view('owner/product/view_product', $data_view, true)
    ];

    echo json_encode($data);
  }
}
