<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

  public function getData(){
    $qry = "SELECT
    users.id_user,user_type.user_type,users.username,users.email,users.tgl_update
    FROM users
    INNER JOIN user_type ON users.id_user_type = user_type.id_user_type
    ";

    $result = $this->db->query($qry);
    // $r['data'] = $result->result();
    return $result->result();
  }

}
