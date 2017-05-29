<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pelamar extends CI_Model {

  public function getData(){
    $qry = "
                  SELECT
                  daftar_pelamar.id_pelamar,
                  daftar_pelamar.id_job_vacancy,
                  daftar_pelamar.id_user,
                  daftar_pelamar.tgl_update,
                  daftar_pelamar.no_registrasi,
                  daftar_pelamar.syarat_administrasi_1,
                  daftar_pelamar.syarat_administrasi_2,
                  daftar_pelamar.syarat_dok_pendukung,
                  daftar_pelamar.status_akhir,
                  users.username,
                  users.email,
                  users.no_ktp,
                  users.`status`
                  FROM
                  daftar_pelamar
                  INNER JOIN users ON daftar_pelamar.id_user = users.id_user
                  WHERE users.`status` = 'aktif'
    ";

    $result = $this->db->query($qry);
    return $result->result();
  }

}
