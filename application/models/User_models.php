<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_models extends CI_Model{

  public function data_user($username)
  {
    $query = $this->db->get_where('tb_user',['username' => $username]);
    return $query;
  }

  public function update()
  {
    $id_user   = $this->session->id_user;
    $nama      = $this->input->post('nama',true);
    $provinsi  = $this->input->post('provinsi',true);
    $kota      = $this->input->post('kota',true);
    $alamat    = $this->input->post('alamat',true);
    $kode_pos  = $this->input->post('kode_pos',true);
    $kecamatan = $this->input->post('kecamatan',true);
    $email     = $this->input->post('email',true);
    $no_telp   = $this->input->post('no_telepon',true);
    $data = [
          "nama"       => $nama,
          "provinsi"   => $provinsi,
          "kota"       => $kota,
          "alamat"     => $alamat,
          "kode_pos"   => $kode_pos,
          "kecamatan"  => $kecamatan,
          "email"      => $email,
          "no_telepon" => $no_telp,
          "status"     => "Terverifikasi"
    ];
    $this->db->where('id_user',$id_user);
    $this->db->update('tb_user',$data);
  }

  public function update_foto($data)
  {
    $id_user      = $this->session->id_user;
    $this->db->where('id_user',$id_user);
    $q = $this->db->update('tb_user',$data);

    return $q;
  }

}
