<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pelamar extends CI_Model {

  public function getData(){
    $qry = "
            SELECT
            users.username,
            users.email,
            users.id_user,
            daftar_pelamar.syarat_administrasi_1,
            daftar_pelamar.syarat_administrasi_2,
            daftar_pelamar.syarat_dok_pendukung,
            data_pendukung.dok_pendukung_1,
            data_pendukung.dok_pendukung_2,
            data_pendukung.dok_pendukung_3,
            data_pendukung.dok_pendukung_4,
            data_pendukung.dok_pendukung_5,
            data_pendukung.dok_pendukung_6,
            data_pendukung.dok_pendukung_7,
            data_pendukung.penghargaan_kepemiluan,
            data_pendukung.karyatulis_kepemiluan

            FROM
            data_pendukung
            INNER JOIN daftar_pelamar ON data_pendukung.id_user = daftar_pelamar.id_user
            INNER JOIN users ON users.id_user = daftar_pelamar.id_user AND users.id_user = data_pendukung.id_user
            INNER JOIN profil_pelamar ON users.id_user = profil_pelamar.id_user
            WHERE users.`status` = 'aktif'
    ";

    $result = $this->db->query($qry);
    return $result->result();
  }

  public function do_upload(){
    $files = $_FILES;
    $cpt = count($_FILES);

    $_FILES['syarat1']['name'] = $files['syarat1']['name'];
    $_FILES['syarat1']['type'] = $files['syarat1']['type'];
    $_FILES['syarat1']['tmp_name'] = $files['syarat1']['tmp_name'];
    $_FILES['syarat1']['error'] = $files['syarat1']['error'];
    $_FILES['syarat1']['size'] = $files['syarat1']['size'];

    $_FILES['syarat2']['name'] = $files['syarat2']['name'];
    $_FILES['syarat2']['type'] = $files['syarat2']['type'];
    $_FILES['syarat2']['tmp_name'] = $files['syarat2']['tmp_name'];
    $_FILES['syarat2']['error'] = $files['syarat2']['error'];
    $_FILES['syarat2']['size'] = $files['syarat2']['size'];

    $_FILES['docpendukung']['name'] = $files['docpendukung']['name'];
    $_FILES['docpendukung']['type'] = $files['docpendukung']['type'];
    $_FILES['docpendukung']['tmp_name'] = $files['docpendukung']['tmp_name'];
    $_FILES['docpendukung']['error'] = $files['docpendukung']['error'];
    $_FILES['docpendukung']['size'] = $files['docpendukung']['size'];
    //
    $this->upload->initialize($this->set_upload_options());
    $this->upload->do_upload();

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
    $result = $this->db->insert('daftar_pelamar', $data1);
  }

  private function set_upload_options(){
      //upload an image options
      $config = array();
      $config['upload_path'] = './uploads/data_pelamar';
      $config['allowed_types'] = 'pdf';
      $config['max_size']      = '0';
      $config['overwrite']     = FALSE;

      return $config;
  }

}
