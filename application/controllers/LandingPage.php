<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Artikel_model');
    $this->load->model('Produk_model');
  }

  public function index()
  {
    $data['judul']    = 'Situs Jual Beli Produk UMKM';
    $data['artikel']  = $this->Artikel_model->getAllData()->result();
    $data['sayuran']  = $this->Produk_model->getSayur()->result();
    $data['buah']     = $this->Produk_model->getBuah()->result();

    $this->load->view('layouts/header', $data);
    $this->load->view('landing_pages/index', $data);
    $this->load->view('layouts/footer');
  }

}
