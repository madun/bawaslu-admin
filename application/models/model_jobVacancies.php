<?php
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

}
