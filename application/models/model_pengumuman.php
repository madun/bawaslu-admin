<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengumuman extends CI_Model {

  public function getData(){
    $qry = "SELECT
    *
    FROM pengumuman ORDER BY tgl_tayang ASC
    ";

    $result = $this->db->query($qry);
    return $result->result();
  }

  public function insertData(){
    date_default_timezone_set("Asia/Jakarta");
    $judul = $this->input->post('judul');
    $start = $this->input->post('start');
    $expired = $this->input->post('expired');
    $isi = $this->input->post('isi');
    $now = date("Y-m-d H:i:s");
    if ($start == '') {
      $start = date("Y-m-d H:i:s");
    }
    $data = array('judul_pengumuman' => $judul,
                 'tgl_insert' => $now,
                 'tgl_tayang' => $start,
                 'tgl_expired' => $expired,
                 'isi_pengumuman' => $isi

               );
    $result = $this->db->insert('pengumuman', $data);
    return $result;
  }

}
