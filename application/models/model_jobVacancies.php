<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class model_jobVacancies extends CI_Model {

  public function getDataKab(){
    $qry = "SELECT kabupaten as name, kabid FROM kabupaten where propid = 3200";
    $result = $this->db->query($qry);
    $r = json_decode(json_encode($result->result()), True);
    return $r;
  }

  public function getData(){
    $qry = "SELECT
            kabupaten.kabupaten,
            job_vacancy.id_job_vacancy,
            job_vacancy.tgl_insert,
            job_vacancy.tgl_tayang,
            job_vacancy.tgl_expired,
            job_vacancy.judul_vacancy,
            job_vacancy.requirement,
            job_vacancy.file_upload
            FROM
            job_vacancy
            LEFT JOIN kabupaten ON job_vacancy.id_kode_daerah = kabupaten.kabid
            WHERE job_vacancy.status_vacancy = 'aktif'

    ";

    $result = $this->db->query($qry);
    // return $result->result();
    $r = json_decode(json_encode($result->result()), True); // $result->result() ke obj kan dulu, lalu kembalikan lagi ke array
    $i=0;
    foreach ($r as $key) {
      if ($key['requirement'] == '') {
        $r[$i]['requirement'] = '';
      }
      $r[$i]['requirement'] = substr($key['requirement'], 0, 50);
      $i++;
    }

    // echo print_r($final);die;
    return $r;
  }

  public function insertData(){
    // karena auto complete ga bisa get id nya
    $kab = $this->input->post('city');
    $getId = "SELECT kabupaten, kabid FROM kabupaten WHERE kabupaten.kabupaten = '".$kab."' ";
    $hasilId = $this->db->query($getId);
    // return $result->result();
    $r = json_decode(json_encode($hasilId->result()), True);
    $idKab;
    foreach ($r as $key) {
      $idkab = $key['kabid'];
    }

    $idKab = $idkab;

    $id = $this->input->post('id_job_vacancy');
    $config['upload_path']="./uploads";
    $config['allowed_types']='gif|jpg|png|jpeg';
    $this->load->library('upload',$config);
    $now = date("Y-m-d H:i:s");
    if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
        'id_kode_daerah' => $idKab,
        'tgl_insert' => $now,
        'tgl_tayang' => $this->input->post('start'),
        'tgl_expired' => $this->input->post('expired'),
        'judul_vacancy' => $this->input->post('judul'),
        'requirement' => $this->input->post('requirement'),
        'file_upload' => base_url()."uploads/".$data['upload_data']['file_name'],
        'status_vacancy' => 'aktif'
        );
    if ($id == '') { //insert
        $result = $this->db->insert('job_vacancy', $data1);
    } else { //edit
      $this->db->where('id_job_vacancy', $id);
      $result = $this->db->update('job_vacancy', $data1);
    }


      if ($result == TRUE) {
          // echo "true";
        return array('success' => TRUE );
      } else {
        return array('success' => FALSE );
      }
    }
  }

  public function getIdJobvacancies($id){
    $qry = "SELECT * FROM job_vacancy
            WHERE id_job_vacancy = $id
    ";

    $result = $this->db->query($qry);
    // $r['data'] = $result->result();
    return $result->result();
  }

  public function updateData(){
    $id = $this->input->post('id_job_vacancy');
    $config['upload_path']="./uploads";
    $config['allowed_types']='gif|jpg|png|jpeg';
    $this->load->library('upload',$config);
    $now = date("Y-m-d H:i:s");
    if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
        $data1 = array(
        // 'id_job_vacancy' => $this->input->post('selectmenuid'),
        'tgl_insert' => $now,
        'tgl_tayang' => $this->input->post('start'),
        'tgl_expired' => $this->input->post('expired'),
        'judul_vacancy' => $this->input->post('judul'),
        'requirement' => $this->input->post('requirement'),
        'file_upload' => $data['upload_data']['file_name'],
        'status_vacancy' => 'aktif'
        );
        $this->db->where('id_job_vacancy', $id);
        $result = $this->db->update('job_vacancy', $data1);
  
      if ($result == TRUE) {
          // echo "true";
        return array('success' => TRUE );
      } else {
        return array('success' => FALSE );
      }
    }
  }

  public function deleteData(){
    $id = $this->input->post('id_job_vacancy');
    $data = array('status_vacancy' => 'tidak aktif');
    $this->db->where('id_job_vacancy', $id);
    $result = $this->db->update('job_vacancy', $data);
    return $result;
  }

}
