<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_models extends CI_Model{

  public function getPengiriman()
  {
      return $this->db->get_where('tb_pengiriman',['id_pengiriman' => 'KRM001']);
  }

}
