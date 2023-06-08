<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
{

  // constructor
  public function __construct()
  {
    parent::__construct();

    $this->load->model('owner/Menu_model', 'menu');
  }

  /**
   * index
   */
  public function index()
  {
    $res = $this->menu->get_all_menu();

    $data = [
      'title'     => 'Data Produk',
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
        'js'    => 'owner/product/core'
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

  public function edit()
  {
    $data = [
      'title'     => 'Ubah Data Produk',
    ];
    $this->load_template('owner/product/edit', $data);
  }

  public function delete($id)
  {
    /* ON PROGRESS */
  }
}
