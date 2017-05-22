<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_detailPelamar extends CI_Model {

  public function getData(){
    $qry = "SELECT
    users.id_user,user_type.user_type,users.username,users.email
    FROM users
    INNER JOIN user_type ON users.id_user_type = user_type.id_user_type
    ";

    $result = $this->db->query($query);
    return $result->result();
  }

}
