<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
  }

  public function login()
  {
    $data['judul']='Login';
    $this->load->view('layouts/header',$data);
    $this->load->view('auth/login');
    $this->load->view('layouts/footer');
  }

  public function proses_login()
  {
    $this->form_validation->set_rules('username','Username','required|min_length[4]');
    $this->form_validation->set_rules('password','Password','required');

    if ($this->form_validation->run() == FALSE) {
      $this->login();
    }else {
      $username = $this->input->post('username',true);
      $password = $this->input->post('password',true);
      $data = array(
              'username' => $username,
              'password' => md5($password)
          );

      $cek_user	= $this->Auth_model->login($data);
      if ($cek_user->num_rows() > 0) {
        $this->session->set_userdata($cek_user->row_array());
        $this->session->set_flashdata('flash',$this->session->username);
        redirect(base_url());
      }else {
        $this->session->set_flashdata('status','Username atau Password tidak ditemukan');
        redirect(base_url('auth/login'));
      }
    }
  }

  public function register()
  {
    $data['judul']='Register';
    $this->load->view('layouts/header',$data);
    $this->load->view('auth/register');
    $this->load->view('layouts/footer');
  }

  public function register_proses()
  {
    $this->form_validation->set_rules('username','Username','required|trim|is_unique[tb_user.username]');
    $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

    if ($this->form_validation->run() == FALSE) {
      $this->register();
    }else {
      $id_user  = $this->Auth_model->id_user();
      $username = $this->input->post('username',true);
      $password = $this->input->post('password',true);
      $date     = date('Y-m-d h:i:s');

      $data = array(
              'id_user'   => $id_user,
              'username'  => $username,
              'password'  => md5($password),
              'level'     => 'User',
              'tgl_daftar'=> $date,
              'level'     => 'User',
              'status'    => 'Belum terverifikasi'
          );

      $result = $this->Auth_model->register($data);
      if ($result) {
        redirect(base_url('auth/login'));
      }else {
        redirect(base_url('auth/register'));
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
