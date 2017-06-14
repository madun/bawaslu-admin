<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

  public function getlogin($u, $p){
    $pwd = md5($p);
    $this->db->where('email', $u);
    $this->db->where('password', $pwd);
    $this->db->where('status', 'aktif');
    $query = $this->db->get('users');

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
          $data = array('id_user' => $row->id_user,
                        'nama' => $row->nama,
                        'no_ktp' => $row->no_ktp,
                        'email' => $row->email,
                        'status' => $row->status
                      );
          $this->session_data($data);
          // $this->status_login($data); // membuat function status login
          //var_dump($this->session->set_userdata('username', $data));
          redirect('success_login');
      }
    } else {
      $this->session->set_flashdata('info','Maaf Username Atau Password anda Salah');
      redirect('login');
    }
  }

  private function session_data($data){
      $sess_data = array(
                    'id_user' => $data['id_user'],
                    'nama' => $data['nama'],
                    'no_ktp' => $data['no_ktp'],
                    'email' => $data['email'],
                    'status' => $data['status']
      );

      $this->session->set_userdata('user', $sess_data);
  }

  // public function status_login($data){
  //     if ($data > 0) {
  //       $query = "UPDATE tb_user SET status_login='1' WHERE id_user=".$this->session->userdata('user')['id_user']." ";
  //       $this->db->query($query);
  //       return true;
  //     } else {
  //       $query = "UPDATE tb_user SET status_login='0' WHERE id_user=".$this->session->userdata('user')['id_user']." ";
  //       $this->db->query($query);
  //       return true;
  //     }
  //
  // }

}
