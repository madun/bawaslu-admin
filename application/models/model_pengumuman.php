<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengumuman extends CI_Model {

  public function getData(){
    $qry = "SELECT * FROM pengumuman
            WHERE status_pengumuman = 'aktif'
    ";
    $result = $this->db->query($qry);
    $r = json_decode(json_encode($result->result()), True); // $result->result() ke obj kan dulu, lalu kembalikan lagi ke array
    $i=0;
    foreach ($r as $key) {
      $r[$i]['isi_pengumuman'] = substr($key['isi_pengumuman'], 0, 50);
      $i++;
    }

    // echo print_r($final);die;
    return $r;
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

  public function getIdPengumuman($id){
    $qry = "SELECT * FROM pengumuman
            WHERE id_pengumuman = $id
    ";

    $result = $this->db->query($qry);
    // $r['data'] = $result->result();
    return $result->result();
  }

}
