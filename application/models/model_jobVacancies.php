<?php
date_default_timezone_set("Asia/Jakarta");
defined('BASEPATH') OR exit('No direct script access allowed');

class model_jobVacancies extends CI_Model {

  public function getData(){
    $qry = "SELECT
            kode_daerah.kode_daerah,
            job_vacancy.id_job_vacancy,
            job_vacancy.tgl_insert,
            job_vacancy.tgl_tayang,
            job_vacancy.tgl_expired,
            job_vacancy.judul_vacancy,
            job_vacancy.requirement,
            job_vacancy.file_upload
            FROM
            job_vacancy
            INNER JOIN kode_daerah ON job_vacancy.id_kode_daerah = kode_daerah.id_kode_daerah
            WHERE job_vacancy.status_vacancy = 'aktif'

    ";

    $result = $this->db->query($qry);
    return $result->result();
  }

  public function insertData(){
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
      $result = $this->db->insert('job_vacancy', $data1);

      if ($result == TRUE) {
          // echo "true";
        return array('success' => TRUE );
      } else {
        return array('success' => FALSE );
      }
    }
  }

}
