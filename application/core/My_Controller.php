<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Produk_models');
  }

  public function search()
  {
    //ambil data keyword
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword',$data['keyword']);
    }else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    $data['search'] = $this->Produk_models->getSearch($data['keyword'])->result();
  }

}
