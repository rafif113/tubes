<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_models extends CI_Model{

  public function getSayur()
  {
      $query = $this->db->get_where('tb_produk',['jenis_produk' => 'Sayuran']);
      return $query;
  }

  public function getSembako()
  {
      $query = $this->db->get_where('tb_produk',['jenis_produk' => 'Sembako']);
      return $query;
  }

  public function getBuah()
  {
      $query = $this->db->get_where('tb_produk',['jenis_produk' => 'Buah']);
      return $query;
  }

  public function getAllProduk()
  {
      $query = $this->db->get('tb_produk');
      return $query;
  }

  public function getProdukSingle($id)
  {
      return $this->db->get_where('tb_produk', array('id_produk' => $id));
  }

  public function getProdukRow($id_produk)
  {
      $query = $this->db->get_where('tb_produk',['id_produk' => $id_produk]);
      return $query;
  }

  public function getKategori()
  {
      $this->db->distinct();
      $this->db->select('jenis_produk');
      $query =  $this->db->get('tb_produk');
      return $query;
  }

  public function getJumlahData()
  {
      $query = $this->db->get('tb_produk');
        if ($query->num_rows() > 0) {
          return $query->num_rows();
        }else {
          return 0;
        }
  }

  public function id_transaksi()
  {
    $transaksi = "TRX";
    $q = "SELECT MAX(TRIM(REPLACE(id_transaksi,'TRX', ''))) as nama
          FROM tb_transaksi WHERE id_transaksi LIKE '$transaksi%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "TRX".$id;
    return $id;
  }

  public function getTransaksi()
  {
    $this->db->select('tb_transaksi.*,tb_produk.*,tb_pengiriman.*');
    $this->db->from('tb_transaksi');
    $this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user');
    $this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi.id_produk');
    $this->db->join('tb_pengiriman', 'tb_pengiriman.id_pengiriman = tb_transaksi.id_pengiriman');
    $this->db->where('id_transaksi',11);
    $query = $this->db->get();
    return $query;
  }



  // public function getSearch($keyword = null)
  // {
  //   if ($keyword) {
  //     $this->db->like('nama_produk', $keyword);
  //     $this->db->or_like('jenis_produk', $keyword);
  //   }
  //   return $this->db->get('tb_produk');
  // }

}
