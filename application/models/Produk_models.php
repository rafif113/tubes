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

  public function getSearch($keyword = null)
  {
    if ($keyword) {
      $this->db->like('nama_produk', $keyword);
      $this->db->or_like('jenis_produk', $keyword);
    }
    return $this->db->get('tb_produk');
  }

}
