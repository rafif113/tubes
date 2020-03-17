<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_models extends CI_Model{

  public function getAllData()
  {
      $query = $this->db->get('tb_artikel');
      return $query;
  }

  public function getSayur()
  {
      $query = $this->db->get_where('tb_artikel',['judul' => 'Sayur Mayur']);
      return $query;
  }

}
