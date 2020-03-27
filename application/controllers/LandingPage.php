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
    // if ($this->input->post('submit')) {
    //   $data['keyword'] = $this->input->post('keyword');
    //   $this->session->set_userdata('keyword',$data['keyword']);
    // }else {
    //   $data['keyword'] = $this->session->userdata('keyword');
    // }

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

  public function proses_check_out()
  {
    $this->load->helper('string');
    date_default_timezone_set('Asia/Jakarta');
    $cart             = $this->cart->contents();
    $id_transaksi     = $this->Transaksi_models->id_transaksi();
    $id_user          = $this->session->id_user;
    $id_pengiriman    = $this->Transaksi_models->getPengiriman()->row();
    $tanggal_deadline = date('Y-m-d H:i:s', time() + (60 * 60 * 24));
    $kode_acak        = random_string('alnum',3);
    $kode_bayar       = $kode_acak . $this->session->no_telepon;
    // $sub_total    = $this->cart->total() + $id_pengiriman->harga_pengiriman;
    // var_dump($id_pengiriman->id_pengiriman);

    foreach ($cart as $cart => $produk) {
      $id_produk = $this->Produk_models->getProdukRow($produk['id'])->row();
      $data = array(
          'id_transaksi'     => '',
          'id_user'          => $id_user,
          'id_produk'        => $id_produk->id_produk,
          'id_pengiriman'    => $id_pengiriman->id_pengiriman,
          'tanggal_deadline' => $tanggal_deadline,
          'tanggal_transaksi'=> '',
          'status_transaksi' => 'Belum dibayar',
          'kode_bayar'       => $kode_bayar,
          'jumlah_produk'    => $produk['qty'],
          'sub_total'        => $produk['subtotal']
      );
      // var_dump($data);
      $this->Transaksi_models->transaksi($data);
    }
    $this->cart->destroy();
    redirect('LandingPage/invoice');
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

  public function invoice($kode_bayar)
  {
    if ($this->session->no_telepon) {
      $data['transaksi']  = $this->Transaksi_models->getTransaksiSingle($kode_bayar)->row_array();
      $data['transaksi1'] = $this->Transaksi_models->totalHarga($kode_bayar)->row_array();
      $data['transaksi2'] = $this->Transaksi_models->getTransaksiSingle($kode_bayar)->result();
      $data['judul'] = 'Invoice | Produk UMKM';
      $this->load->view('layouts/header', $data);
      $this->load->view('landing_pages/invoice',$data);
      $this->load->view('layouts/footer');
    }else {
      redirect('NotFound');
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

  public function wishlist()
  {
    if ($this->session->username) {
      $data['judul'] = 'Shopping Wishlist | Produk UMKM';
      $this->load->view('layouts/header', $data);
      $this->load->view('landing_pages/wishlist', $data);
      $this->load->view('layouts/footer');
    }else {
      redirect(base_url('Auth/login'));
    }
  }

  public function tunggu_pembayaran()
  {
    $data['judul'] = 'Tunggu Pembayaran | Produk UMKM';
    $data['transaksi'] = $this->Transaksi_models->getTransaksi()->result();
    $this->load->view('layouts/header',$data);
    $this->load->view('landing_pages/tunggu_pembayaran',$data);
    $this->load->view('layouts/footer');
  }



}
