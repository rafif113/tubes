<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model{

  public function id_transaksi()
  {
    $transaksi = "TRX";
    $q         = "SELECT MAX(TRIM(REPLACE(id_transaksi,'TRX', ''))) as nama
                  FROM tb_transaksi WHERE id_transaksi LIKE '$transaksi%'";
    $baris     = $this->db->query($q);
    $akhir     = $baris->row()->nama;
    $akhir++;
    $id        = str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id        = "TRX".$id;
    return $id;
  }

  public function getPengiriman()
  {
    $query = $this->db->get_where('tb_pengiriman',['id_pengiriman' => 'KRM0001']);
    return $query;
  }

  public function transaksi($data_transaksi)
  {
    $query = $this->db->insert('tb_transaksi', $data_transaksi);
    return $query;
  }

  public function detailTransaksi($data_detail)
  {
    $query = $this->db->insert('tb_detailtransaksi', $data_detail);
    return $query;
  }

  public function getTransaksi()
  {
    $id_user   = $this->session->id_user;
    $procedure = "CALL pview_transaksi_user('$id_user')";
    $query     = $this->db->query($procedure);
    return $query;
  }

  public function getTransaksiSingle($kode_bayar)
  {
    $procedure = "CALL pview_single_transaksi('$kode_bayar')";
    $query     = $this->db->query($procedure);
    return $query;
  }

  public function getDetailTransaksi($kode_bayar)
  {
    $procedure = "CALL pview_detail_transaksi('$kode_bayar')";
    $query     = $this->db->query($procedure);
    return $query;
  }

  public function getSumHarga($kode_bayar)
  {
    $procedure = "CALL pview_status('$kode_bayar')";
    $query     = $this->db->query($procedure);
    return $query;
  }
}
