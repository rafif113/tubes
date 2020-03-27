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

}
