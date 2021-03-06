<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Profile_model');
    $this->load->model('Produk_model');
  }

  public function index()
  {
    $judul['judul']  = 'Profile | Produk UMKM';
    $data['user']    = $this->Profile_model->getUser($this->session->username)->row();

    $this->load->view('layouts/header', $judul);
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
      $this->index();
    }else {
      $this->Profile_model->update();
      $this->session->set_flashdata('flash','Diubah');
      redirect('Profile');
    }
  }

  public function upload_foto()
  {
    if (empty($_FILES['foto_user']['name'])) {
    $this->form_validation->set_rules('foto_user','Foto User','required');
      if ($this->form_validation->run() == FALSE) {
    $this->index();
    }
  }else {
    $config['upload_path']   = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = 2000;
    $config['encrypt_name']  = TRUE;
    $this->load->library('upload', $config);

    if (! $this->upload->do_upload('foto_user')) {
      $this->session->set_flashdata('status','File gagal diupload.');
      redirect(base_url('Profile'));
      }else {
      $foto_user = $this->upload->data('file_name');

      $data = ['foto_user' => $foto_user];
      $this->Profile_model->updateFoto($data);
      $this->session->set_flashdata('flash','Diubah');
      redirect(base_url('Profile'));
      }
    }
  }

  public function hapus_foto()
  {
      $data = ['foto_user' => ''];
      $this->Profile_model->updateFoto($data);
      $this->session->set_flashdata('flash','Dihapus');
      redirect(base_url('Profile'));
  }
}
