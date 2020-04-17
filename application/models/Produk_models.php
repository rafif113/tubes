<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_models extends CI_Model{

  public function getSayur()
  {
      $procedure = "CALL view_produk_sayur('Sayuran')";
      $query     = $this->db->query($procedure);
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
      $procedure = 'CALL view_produk()';
      $query     = $this->db->query($procedure);
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
          return $query;
        }else {
          return 0;
        }
  }

  public function getWishlist()
  {
    $id = $this->session->id_user;
    $this->db->select('tb_wishlist.*,tb_produk.*');
    $this->db->from('tb_wishlist');
    $this->db->join('tb_produk', 'tb_produk.id_produk = tb_wishlist.id_produk');
    $this->db->where('tb_wishlist.id_user',$id);
    $query = $this->db->get();
    return $query;
  }

  public function tambahWishlist($data)
  {
    $query = $this->db->insert('tb_wishlist', $data);
    return $query;
  }

  public function hapusWishlist($id)
  {
    $this->db->where('id_wishlist', $id);
    $this->db->delete('tb_wishlist');
  }

  public function idWishlist()
  {
    $wishlist = "WHS";
    $q = "SELECT MAX(TRIM(REPLACE(id_wishlist,'WHS', ''))) as nama
          FROM tb_wishlist WHERE id_wishlist LIKE '$wishlist%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "WHS".$id;
    return $id;
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
