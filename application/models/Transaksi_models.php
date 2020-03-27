<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_models extends CI_Model{

  public function getPengiriman()
  {
    $query = $this->db->get_where('tb_pengiriman',['id_pengiriman' => 'KRM001']);
    return $query;
  }

  public function transaksi($data)
  {
    $query = $this->db->insert('tb_transaksi', $data);
    return $query;
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
    $id_user = $this->session->id_user;
    $this->db->distinct();
    $this->db->select('kode_bayar,status_transaksi,tanggal_deadline');
    $this->db->where('id_user', $id_user);
    $query = $this->db->get('tb_transaksi');
    return $query;
  }

  public function getTransaksiSingle($kode_bayar)
  {
    $this->db->select('tb_transaksi.*,tb_produk.*,tb_pengiriman.*,tb_user.*');
    $this->db->from('tb_transaksi');
    $this->db->join('tb_user', 'tb_user.id_user = tb_transaksi.id_user');
    $this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi.id_produk');
    $this->db->join('tb_pengiriman', 'tb_pengiriman.id_pengiriman = tb_transaksi.id_pengiriman');
    $this->db->where('tb_transaksi.kode_bayar',$kode_bayar);
    $query = $this->db->get();
    return $query;
  }

  public function totalHarga($kode_bayar)
  {
    $this->db->select_sum('sub_total');
    // $this->db->from('tb_transaksi');
    // $this->db->join('tb_pengiriman', 'tb_pengiriman.id_pengiriman = tb_transaksi.id_pengiriman');
    // $this->db->where('tb_transaksi.kode_bayar',$kode_bayar);
    $query = $this->db->get_where('tb_transaksi',['kode_bayar' => $kode_bayar]);
    return $query;
  }

}
