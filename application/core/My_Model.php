<?php

class My_Model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function return_success($message, $data)
  {
    $return = [
      'message' => $message, 'data' => $data, 'status' => true
    ];
    return $return;
  }

  function return_failed($message, $data)
  {
    $return = [
      'message' => $message, 'data' => $data, 'status' => false
    ];
    return $return;
  }
}