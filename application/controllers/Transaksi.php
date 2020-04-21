<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Produk_model');
    $this->load->model('Profile_model');
    $this->load->model('Transaksi_model');
  }

  public function check_out()
  {
    if ($this->cart->contents()) {
      if ($this->session->username) {
        $username           = $this->session->username;
        $data['judul']      = 'CheckOut | Produk UMKM';
        $data['cart']       = $this->cart->contents();
        $data['pengiriman'] = $this->Transaksi_model->getPengiriman()->row();
        $data['user']       = $this->Profile_model->getUser($username)->row();

        $this->load->view('layouts/header', $data);
        $this->load->view('transaksi/check_out', $data);
        $this->load->view('layouts/footer');
      }else {
        redirect(base_url('Auth/login'));
      }
    }else {
      $this->session->set_flashdata('barang','Diubah');
      redirect('Produk');
    }
  }

  public function proses_check_out()
  {
    $this->load->helper('string');
    date_default_timezone_set('Asia/Jakarta');
    $cart             = $this->cart->contents();
    $id_transaksi     = $this->Transaksi_model->id_transaksi();
    $id_user          = $this->session->id_user;
    $id_pengiriman    = $this->Transaksi_model->getPengiriman()->row();
    $tanggal_deadline = date('Y-m-d H:i:s', time() + (60 * 60 * 24));
    $kode_acak        = random_string('alnum',3);
    $kode_bayar       = $kode_acak . $this->session->no_telepon;
    $total            = $this->cart->total() + $id_pengiriman->harga_pengiriman;

    $data_transaksi = array(
          'id_transaksi'     => $id_transaksi,
          'id_user'          => $id_user,
          'id_pengiriman'    => $id_pengiriman->id_pengiriman,
          'tanggal_deadline' => $tanggal_deadline,
          'tanggal_transaksi'=> '',
          'status_transaksi' => 'Dikirim',
          'kode_bayar'       => $kode_bayar,
          'total'            => $total
      );
    $this->Transaksi_model->transaksi($data_transaksi);
    foreach ($cart as $cart => $produk) {
      $id_produk = $this->Produk_model->getProdukRow($produk['id'])->row();
      $data_detail = array(
          'id_transaksi'     => $id_transaksi,
          'id_produk'        => $id_produk->id_produk,
          'jumlah_produk'    => $produk['qty'],
          'subtotal'         => $produk['subtotal']
      );
      $this->Transaksi_model->detailTransaksi($data_detail);
    }
    $this->cart->destroy();
    redirect('Transaksi/invoice/'.$kode_bayar);
  }

  public function tunggu_pembayaran()
  {
    if ($this->session->no_telepon) {
      $data['judul']     = 'Tunggu Pembayaran | Produk UMKM';
      $data['transaksi'] = $this->Transaksi_model->getTransaksi()->result();
      $this->load->view('layouts/header',$data);
      $this->load->view('transaksi/tunggu_pembayaran',$data);
      $this->load->view('layouts/footer');
    }else {
      redirect(base_url());
    }
  }

  public function invoice($kode_bayar)
  {
    if ($this->session->no_telepon) {
      $data['judul']      = 'Invoice | Produk UMKM';
      $data['detail']     = $this->Transaksi_model->getDetailTransaksi($kode_bayar)->result();
      $data['sumharga']   = $this->Transaksi_model->getSumHarga($kode_bayar)->row_array();
      $data['transaksi']  = $this->Transaksi_model->getTransaksiSingle($kode_bayar)->row_array();

      $this->load->view('layouts/header', $data);
      $this->load->view('transaksi/invoice',$data);
      $this->load->view('layouts/footer');
    }else {
      redirect('NotFound');
    }
  }

  public function cetak($kode_bayar)
  {
    if ($this->session->no_telepon) {
      $data['detail']    = $this->Transaksi_model->getDetailTransaksi($kode_bayar)->result();
      $data['sumharga']  = $this->Transaksi_model->getSumHarga($kode_bayar)->row_array();
      $data['transaksi'] = $this->Transaksi_model->getTransaksiSingle($kode_bayar)->row_array();
      $this->load->view('transaksi/cetak_invoice',$data);
    }else {
      redirect(base_url());
    }
  }
}
