<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Artikel_models');
    $this->load->model('Produk_models');
    $this->load->model('User_models');
    $this->load->model('Transaksi_models');
  }

  public function index()
  {
    //ambil data keyword
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword',$data['keyword']);
    }else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    $data['judul']   = 'Situs Jual Beli Produk UMKM';
    $data['artikel'] = $this->Artikel_models->getAllData()->result();
    $data['sayuran'] = $this->Produk_models->getSayur()->result();
    $data['buah']    = $this->Produk_models->getBuah()->result();
    $data['sembako'] = $this->Produk_models->getSembako()->result();
    $data['kategori']= $this->Artikel_models->getSayur()->result();
    $this->load->view('layouts/header', $data);
    $this->load->view('landing_pages/index', $data);
    $this->load->view('layouts/footer');
  }

  public function validasi()
  {
    if ($this->session->id_user == null) {
      redirect('Auth/login');
      }
  }

  public function shop()
  {
    $data['kategori']= $this->Produk_models->getKategori()->result();
    $data['produk']= $this->Produk_models->getAllProduk()->result();
    $data['jumlah']= $this->Produk_models->getJumlahData();

    $data['judul']   = 'Shop | Produk UMKM';
    $this->load->view('layouts/header', $data);
    $this->load->view('landing_pages/shop',$data);
    $this->load->view('layouts/footer');
  }

  public function check_out()
  {
    if ($this->cart->contents()) {
      if ($this->session->username) {
        $username = $this->session->username;
        $user     = $this->User_models->data_user($username)->row();

        $data['pengiriman'] = $this->Transaksi_models->getPengiriman()->row();
        $data['cart']  = $this->cart->contents();
        $data['user']  = $user;
        $data['judul'] = 'CheckOut | Produk UMKM';
        $this->load->view('layouts/header', $data);
        $this->load->view('landing_pages/check_out', $data);
        $this->load->view('layouts/footer');
      }else {
        redirect(base_url('Auth/login'));
      }
    }else {
      $this->session->set_flashdata('barang','Diubah');
      redirect('LandingPage/shop');
    }

  }

  public function shopping_cart()
  {
    if ($this->session->username) {
      $data['cart']  = $this->cart->contents();
      $data['judul'] = 'Shopping Chart | Produk UMKM';
      $this->load->view('layouts/header', $data);
      $this->load->view('landing_pages/shopping_cart', $data);
      $this->load->view('layouts/footer');
    }else {
      redirect(base_url('Auth/login'));
    }
  }

  public function faq()
  {
    $data['judul'] = 'Faq | Produk UMKM';
    $this->load->view('layouts/header', $data);
    $this->load->view('landing_pages/faq');
    $this->load->view('layouts/footer');
  }

  public function detail_produk($id)
  {
    $query = $this->Produk_models->getProdukSingle($id)->row();
    $data['produk'] = $query;

    $data['judul']  = 'Detail | Produk UMKM';
    $this->load->view('layouts/header',$data);
    $this->load->view('landing_pages/detail_produk',$data);
    $this->load->view('layouts/footer');
  }



}
