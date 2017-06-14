<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pelamar extends CI_Model {

  public function getData(){
   //  $WHERE;
   // if (isset($kabid)) {
   //   $WHERE = " AND id_kode_daerah =".$kabid;
   // }
   // else{
   // $WHERE = " ";
   //  }
    // else if (condition) {
   //   # code...
   // }
    $qry = "SELECT a.no_ktp,
            a.email,
            a.nama,
            a.status,
            b.tgl_insert,
            b.tgl_update,
            b.penghargaan_kepemiluan,
            b.karyatulis_kepemiluan,
            b.dok_pendukung_1,
            b.dok_pendukung_2,
            b.dok_pendukung_3,
            b.dok_pendukung_4,
            b.ktp,
            b.ijazah,
            b.skck,
            b.kk,
            c.id_pelamar,
            c.id_job_vacancy,
            c.tgl_update,
            c.no_registrasi,
            c.syarat_administrasi_1,
            c.syarat_administrasi_2,
            c.status_akhir,
            d.id_user,
            d.id_kode_daerah,
            d.email,
            d.no_ktp,
            d.nama,
            d.nama_panggil,
            d.tgl_lahir,
            d.tempat_lahir,
            d.jenis_kelamin,
            d.no_hp,
            d.agama,
            d.status_pernikahan,
            d.alamat_ktp,
            d.propid,
            d.kabid,
            d.camatid,
            d.kode_pos,
            d.bidang_pendidikan,
            d.jenjang_pendidikan,
            d.program_studi_jurusan,
            d.ipk,
            d.nama_perusahaan,
            d.jabatan,
            d.tahun_masuk,
            d.tahun_keluar,
            d.foto_profil,
            e.kabid,
            e.kabupaten,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS tahun,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%m')+0) AS bulan
            FROM users a, data_pendukung b, daftar_pelamar c, profil_pelamar d, kabupaten e
            WHERE a.status = 'aktif' 
        AND a.id_user = b.id_user
        AND b.id_user = c.id_user
        AND c.id_user = d.id_user 
        AND  d.kabid = e.kabid
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

  public function getIdPelamar($id){
    $qry = " SELECT
            users.no_ktp,
            users.email,
            users.nama,
            users.`status`,
            data_pendukung.tgl_insert,
            data_pendukung.tgl_update,
            data_pendukung.penghargaan_kepemiluan,
            data_pendukung.karyatulis_kepemiluan,
            data_pendukung.dok_pendukung_1,
            data_pendukung.dok_pendukung_2,
            data_pendukung.dok_pendukung_3,
            data_pendukung.dok_pendukung_4,
            data_pendukung.ktp,
            data_pendukung.ijazah,
            data_pendukung.skck,
            data_pendukung.kk,
            daftar_pelamar.id_pelamar,
            daftar_pelamar.id_job_vacancy,
            daftar_pelamar.tgl_update,
            daftar_pelamar.no_registrasi,
            daftar_pelamar.syarat_administrasi_1,
            daftar_pelamar.syarat_administrasi_2,
            daftar_pelamar.status_akhir,
            profil_pelamar.id_user,
            profil_pelamar.id_kode_daerah,
            profil_pelamar.email,
            profil_pelamar.no_ktp,
            profil_pelamar.nama,
            profil_pelamar.nama_panggil,
            profil_pelamar.tgl_lahir,
            profil_pelamar.tempat_lahir,
            profil_pelamar.jenis_kelamin,
            profil_pelamar.no_hp,
            profil_pelamar.agama,
            profil_pelamar.status_pernikahan,
            profil_pelamar.alamat_ktp,
            profil_pelamar.propid,
            profil_pelamar.kabid,
            profil_pelamar.camatid,
            profil_pelamar.kode_pos,
            profil_pelamar.bidang_pendidikan,
            profil_pelamar.jenjang_pendidikan,
            profil_pelamar.program_studi_jurusan,
            profil_pelamar.ipk,
            profil_pelamar.nama_perusahaan,
            profil_pelamar.jabatan,
            profil_pelamar.tahun_masuk,
            profil_pelamar.tahun_keluar,
            profil_pelamar.foto_profil,
            kabupaten.kabid,
            kabupaten.kabupaten,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS tahun,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%m')+0) AS bulan
            FROM
            data_pendukung
            INNER JOIN daftar_pelamar ON data_pendukung.id_user = daftar_pelamar.id_user
            INNER JOIN users ON users.id_user = daftar_pelamar.id_user AND users.id_user = data_pendukung.id_user
            INNER JOIN profil_pelamar ON users.id_user = profil_pelamar.id_user
            INNER JOIN kabupaten ON profil_pelamar.kabid = kabupaten.kabid
            WHERE users.`status` = 'aktif' AND daftar_pelamar.id_pelamar = $id
    ";

    $result = $this->db->query($qry);
    // $r['data'] = $result->result();
    return $result->result();
  }

}
