<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Produk_model');
  }

  public function index()
  {
    $data['judul']    = 'Shop | Produk UMKM';
    $data['kategori'] = $this->Produk_model->getKategori()->result();
    $data['produk']   = $this->Produk_model->getAllProduk()->result();
    $data['jumlah']   = $this->Produk_model->getJumlahData()->num_rows();

    $this->load->view('layouts/header', $data);
    $this->load->view('produk/shop', $data);
    $this->load->view('layouts/footer');
  }

  public function shopping_cart()
  {
    if ($this->session->username) {
      $data['cart']  = $this->cart->contents();
      $data['judul'] = 'Shopping Chart | Produk UMKM';
      $this->load->view('layouts/header', $data);
      $this->load->view('produk/shopping_cart', $data);
      $this->load->view('layouts/footer');
    }else {
      redirect(base_url('Auth/login'));
    }
  }

  public function detail_produk($id)
  {
    $data['judul']  = 'Detail | Produk UMKM';
    $data['produk'] = $this->Produk_model->getProdukSingle($id)->row();

    $this->load->view('layouts/header',$data);
    $this->load->view('produk/detail_produk',$data);
    $this->load->view('layouts/footer');
  }

  public function wishlist()
  {
    if ($this->session->username) {
      $data['judul']    = 'Shopping Wishlist | Produk UMKM';
      $data['wishlist'] = $this->Produk_model->getWishlist()->result();
      $this->load->view('layouts/header', $data);
      $this->load->view('produk/wishlist', $data);
      $this->load->view('layouts/footer');
    }else {
      redirect(base_url('Auth/login'));
    }
  }

  public function tambah_wishlist($id)
  {
    $id_user     = $this->session->id_user;
    $id_produk   = $id;
    $id_wishlist = $this->Produk_model->idWishlist();

    $data = array(
        'id_wishlist' => $id_wishlist,
        'id_user'     => $id_user,
        'id_produk'   => $id_produk
    );
    $result = $this->Produk_model->tambahWishlist($data);
    if ($result) {
      redirect(base_url('Produk/wishlist'));
    }
  }

  public function hapus_wishlist($id)
  {
    $this->Produk_model->hapusWishlist($id);
    redirect('Produk/wishlist');
  }

  public function tambah_keranjang()
  {
    if ($this->session->username) {
      $id_produk      = $this->input->get('id_produk');
      $data['produk'] = $this->Produk_model->getProdukRow($id_produk)->row();
      $qty            = $this->input->post('qty') ? $this->input->post('qty') : 1;
      $data = array(
          'id'   => $id_produk,
          'qty'  => $qty,
          'price'=> $data['produk']->harga_produk,
          'name' => $data['produk']->nama_produk
      );
        $this->cart->insert($data);
        redirect('Produk/shopping_cart');

    }else {
      $this->cart->destroy();
      redirect(base_url('Auth/login'));
    }
  }

  public function hapus_cart($rowid='')
  {
    if ($rowid) {
      $this->cart->remove($rowid);
      redirect(base_url('Produk/shopping_cart'));
    }else {
      $this->cart->destroy();
      $this->session->set_flashdata('flash','Dihapus');
      redirect(base_url('Produk/shopping_cart'));
    }
	}

  public function update_cart($rowid)
  {
    $qty = $this->input->post('qty');
    if ($rowid) {
      $data = array(
          'rowid'   => $rowid,
          'qty'   => $qty
      );
      $this->cart->update($data);
      redirect('Produk/shopping_cart');

    }else {
      redirect('Produk/shopping_cart');
    }
  }

  public function ulasan()
  {
    $id_produk = $this->input->post('id_produk');

    $this->form_validation->set_rules('isi_testimoni','Deskripsi Ulasan','required');
    $this->form_validation->set_rules('rating','Rating','required|decimal');
    if ($this->form_validation->run() == FALSE) {
      echo "<script>alert('".form_error('rating').'\n'.form_error('isi_testimoni')."');history.go(-1);</script>";
    }else {
      $id_testimoni  = $this->Produk_model->idTestimoni();
      $id_user       = $this->session->id_user;
      $isi_testimoni = $this->input->post('isi_testimoni');
      $rating        = $this->input->post('rating');
      $tgl_testimoni = date('Y-m-d');
      $validasi      = $this->Produk_model->getValidasiUlasan($id_user,$id_produk)->result();

      if (empty($validasi)) {
        $this->session->set_flashdata('ulasan_gagal','Anda belum membeli produk ini.');
        redirect('Produk/detail_produk/'.$id_produk);
      }else {
        $data = array(
            'id_testimoni'   => $id_testimoni,
            'id_user'        => $id_user,
            'id_produk'      => $id_produk,
            'isi_testimoni'  => $isi_testimoni,
            'rating'         => $rating,
            'tgl_testimoni'  => $tgl_testimoni
        );
        $result = $this->Produk_model->insertUlasan($data);
        $this->session->set_flashdata('ulasan_berhasil','Ulasan berhasil ditambah.');
        redirect('Produk/detail_produk/'.$id_produk);
      }
    }
  }

}
