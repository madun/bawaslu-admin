<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_detailPelamar extends CI_Model {

  public function getData(){

    $id = $this->uri->segment(3);
    $qry = "SELECT
    users.id_user,user_type.user_type,users.nama,users.email,users.no_ktp,users.tgl_insert,users.tgl_update
    FROM users
    INNER JOIN user_type ON users.id_user_type = user_type.id_user_type
    WHERE users.id_user = $id
    ";

    $result = $this->db->query($qry);
    return $result->result();
  }

}
