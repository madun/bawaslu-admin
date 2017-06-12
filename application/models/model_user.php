<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

  public function getData(){
    $qry = "SELECT
    users.id_user,user_type.user_type,user_type.id_user_type,users.nama,users.email,users.tgl_update
    FROM users
    INNER JOIN user_type ON users.id_user_type = user_type.id_user_type
    WHERE users.status = 'aktif'
    ";

    $result = $this->db->query($qry);
    // $r['data'] = $result->result();
    return $result->result();
  }

  public function insertData(){
    date_default_timezone_set("Asia/Jakarta");
    $email = $this->input->post('email');
    $user = $this->input->post('user');
    $akses = $this->input->post('akses');
    $start = $this->input->post('start');
    $password = $this->input->post('password');
    if ($start == '') {
      $start = date("Y-m-d H:i:s");
    }
    $sql = $this->db->query("SELECT max(id_user) as terakhir from users");

    $query = $sql->row_array();
    $lastID = $query['terakhir'];
    $lastNoUrut = substr($lastID, 4, 9);
    $nextNoUrut = $lastNoUrut + 1;
    // NO REGISTRASI
    $urutan = sprintf("%04s",$nextNoUrut);
    $expired = date("Y-m-d H:i:s");

    if ($akses == 1){
      $data = array(
                  'id_user' => $urutan,
                  'email' => $email,
                  'password' => md5($password),
                  'nama' => $user,
                  'id_user_type' => $akses,
                  'tgl_insert' => $start,
                  'tgl_update' => $expired
                 );
    }else{
      $data = array('email' => $email,
                   'nama' => $user,
                   'id_user_type' => $akses,
                   'tgl_insert' => $start,
                   'tgl_update' => $expired
                 );
    }
    $result = $this->db->insert('users', $data);
    return $result;
  }

  public function getid_edit($id){
    $qry = "SELECT
    users.id_user,user_type.user_type,user_type.id_user_type,users.nama,users.email,users.tgl_update,users.password,users.tgl_insert
    FROM users
    INNER JOIN user_type ON users.id_user_type = user_type.id_user_type
    WHERE users.id_user = $id
    ";

    $result = $this->db->query($qry);
    // $r['data'] = $result->result();
    return $result->result();
  }

  public function updateData(){
    date_default_timezone_set("Asia/Jakarta");
    $id = $this->input->post('id_user');
     $email = $this->input->post('email');
     $user = $this->input->post('user');
     $akses = $this->input->post('akses');
     $start = $this->input->post('start');
     $expired = date("Y-m-d H:i:s");
     $password = $this->input->post('password');

     if ($akses == 1){
     $data = array('email' => $email,
									'nama' => $user,
									'id_user_type' => $akses,
                  'password' => md5($password),
                  'tgl_update' => $expired
	     );
      }
      else{
        $data = array(
                  'nama' => $user,
                  'id_user_type' => $akses,
                  'password' => $password,
                  'tgl_update' => $expired
            );
      }
     $this->db->where('id_user', $id);
     $result = $this->db->update('users', $data);
     return $result;
  }

  public function deleteData(){
    // $id = $this->input->post('id_user');
    $email = $this->input->post('email');
    // $data = array('status' => 'tidak aktif');
    // $this->db->where('id_user', $id);
    $this->db->where('email', $email);
    // $result = $this->db->update('users', $data);
    $result = $this->db->delete('users');

    $this->db->where('email', $email);
    $result = $this->db->delete('profil_pelamar');
    return $result;
  }

}
