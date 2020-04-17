<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_models');
  }

  public function profile()
  {
    $username = $this->session->username;
    $user = $this->User_models->data_user($username)->row();

    $jdl['judul'] = 'Profile | Produk UMKM';
    $data['user']  = $user;
    $this->load->view('layouts/header', $jdl);
    $this->load->view('landing_pages/profile',$data);
    $this->load->view('layouts/footer');
  }

  public function profile_proses()
  {
    $this->form_validation->set_rules('nama','Nama Lengkap','required');
    $this->form_validation->set_rules('provinsi','Provinsi','required');
    $this->form_validation->set_rules('kota','Kota','required');
    $this->form_validation->set_rules('alamat','Alamat','required|min_length[5]');
    $this->form_validation->set_rules('kode_pos','Kode pos','required|min_length[4]');
    $this->form_validation->set_rules('kecamatan','Kecamatan','required');
    $this->form_validation->set_rules('no_telepon','Nomor Telepon','required|numeric|min_length[10]');
    $this->form_validation->set_rules('email','Email','required|valid_email');

    if ($this->form_validation->run() == FALSE) {
      echo "as";
    }else {
      $this->User_models->update();
      $this->session->set_flashdata('flash','Diubah');
      redirect('user/profile');
    }
  }

  public function upload_foto()
  {
    if (empty($_FILES['foto_user']['name'])) {
    $this->form_validation->set_rules('foto_user','Foto User','required');
      if ($this->form_validation->run() == FALSE) {
    $this->profile();
    }
  }else {
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 2000;
    $config['encrypt_name']         = TRUE;

    $this->load->library('upload', $config);

    if (! $this->upload->do_upload('foto_user')) {
      $this->session->set_flashdata('status','File gagal diupload.');
      redirect(base_url('User/profile'));
      }else {
      $foto_user    = $this->upload->data('file_name');
      $data = [
            'foto_user' => $foto_user
      ];
      $this->User_models->update_foto($data);
      $this->session->set_flashdata('flash','Diubah');
      redirect(base_url('User/profile'));

      }
    }
  }

    public function hapus_foto()
    {
        $data = [
              'foto_user' => ''
        ];
        $this->User_models->update_foto($data);
        $this->session->set_flashdata('flash','Dihapus');
        redirect(base_url('User/profile'));
    }



}
