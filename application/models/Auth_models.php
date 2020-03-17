<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_models extends CI_Model{

  public function login($data)
  {
    $this->db->where('username',$data['username']);
    $this->db->where('password',$data['password']);
    $query  = $this->db->get('tb_user');
    return $query;
  }

  public function id_user()
  {
    $user = "USR";
    $q = "SELECT MAX(TRIM(REPLACE(id_user,'USR', ''))) as nama
          FROM tb_user WHERE id_user LIKE '$user%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 4, "0", STR_PAD_LEFT);
    $id = "USR".$id;
    return $id;
  }

  public function register($data)
  {
    $query = $this->db->insert('tb_user',$data);
    return $query;
  }
}
