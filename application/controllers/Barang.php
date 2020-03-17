<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Produk_models');
  }

  public function tambah_keranjang()
  {
    if ($this->session->username) {
      $id_produk = $this->input->get('id_produk');
      $data['produk'] = $this->Produk_models->getProdukRow($id_produk)->row();
      $qty = $this->input->post('qty') ? $this->input->post('qty') : 1;
      $data = array(
          'id'   => $id_produk,
          'qty'  => $qty,
          'price'=> $data['produk']->harga_produk,
          'name' => $data['produk']->nama_produk
      );

      $this->cart->insert($data);
      redirect('LandingPage/shopping_cart');
    }else {
      $this->cart->destroy();
      redirect(base_url('Auth/login'));
    }
  }

  public function hapus_cart($rowid='')
  {
    if ($rowid) {
      $this->cart->remove($rowid);
      redirect(base_url('LandingPage/shopping_cart'));
    }else {
      $this->cart->destroy();
      $this->session->set_flashdata('flash','Dihapus');
      redirect(base_url('LandingPage/shopping_cart'));
    }
	}

  public function update_cart($rowid)
  {
    $qty  = $this->input->post('qty');
    if ($rowid) {
      $data = array(
          'rowid'   => $rowid,
          'qty'   => $qty
      );
      $this->cart->update($data);
      redirect(base_url('LandingPage/shopping_cart'));

    }else {
      redirect(base_url('LandingPage/shopping_cart'));
    }
  }

}
