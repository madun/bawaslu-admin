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
    $expired = $this->input->post('expired');
    $data = array('email' => $email,
                 'nama' => $user,
                 'id_user_type' => $akses,
                 'tgl_insert' => $start,
                 'password' => md5($password),
                 'tgl_update' => $expired

               );
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
     $expired = $this->input->post('expired');
     $password = $this->input->post('password');

     $data = array('email' => $email,
									'nama' => $user,
									'id_user_type' => $akses,
                  'tgl_insert' => $start,
                  'password' => md5($password),
                  'tgl_update' => $expired

	 );
     $this->db->where('id_user', $id);
     $result = $this->db->update('users', $data);
     return $result;
  }

  public function deleteData(){
    $id = $this->input->post('id_user');
    $data = array('status' => 'tidak aktif');
    $this->db->where('id_user', $id);
    $result = $this->db->update('users', $data);
    return $result;
  }

}
