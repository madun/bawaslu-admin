<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_proses extends CI_Model {

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
    $qry = "
            SELECT
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
            data_pendukung.dok_pendukung_5,
            data_pendukung.dok_pendukung_6,
            data_pendukung.dok_pendukung_7,
            data_pendukung.dok_pendukung_8,
            data_pendukung.dok_pendukung_9,
            data_pendukung.dok_pendukung_10,
            data_pendukung.dok_pendukung_11,
            data_pendukung.dok_pendukung_12,
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
            daftar_pelamar.dok_1,
            daftar_pelamar.dok_2,
            daftar_pelamar.dok_3,
            daftar_pelamar.dok_4,
            daftar_pelamar.dok_5,
            daftar_pelamar.dok_6,
            daftar_pelamar.dok_7,
            daftar_pelamar.dok_8,
            daftar_pelamar.dok_9,
            daftar_pelamar.dok_10,
            daftar_pelamar.dok_11,
            daftar_pelamar.dok_12,
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
            profil_pelamar.alamat_domisili,
            profil_pelamar.bidang_pendidikan,
            profil_pelamar.jenjang_pendidikan,
            profil_pelamar.universitas_sekolah,
            profil_pelamar.program_studi_jurusan,
            profil_pelamar.ipk,
            profil_pelamar.nama_perusahaan,
            profil_pelamar.jabatan,
            profil_pelamar.tahun_masuk,
            profil_pelamar.tahun_keluar,
            profil_pelamar.foto_profil,
            kabupaten.kabid,
            kabupaten.kabupaten
            FROM
            data_pendukung
            INNER JOIN daftar_pelamar ON data_pendukung.id_user = daftar_pelamar.id_user
            INNER JOIN users ON users.id_user = daftar_pelamar.id_user AND users.id_user = data_pendukung.id_user
            INNER JOIN profil_pelamar ON users.id_user = profil_pelamar.id_user
            INNER JOIN kabupaten ON profil_pelamar.kabid = kabupaten.kabid
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
            data_pendukung.dok_pendukung_5,
            data_pendukung.dok_pendukung_6,
            data_pendukung.dok_pendukung_7,
            data_pendukung.dok_pendukung_8,
            data_pendukung.dok_pendukung_9,
            data_pendukung.dok_pendukung_10,
            data_pendukung.dok_pendukung_11,
            data_pendukung.dok_pendukung_12,
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
            daftar_pelamar.dok_1,
            daftar_pelamar.dok_2,
            daftar_pelamar.dok_3,
            daftar_pelamar.dok_4,
            daftar_pelamar.dok_5,
            daftar_pelamar.dok_6,
            daftar_pelamar.dok_7,
            daftar_pelamar.dok_8,
            daftar_pelamar.dok_9,
            daftar_pelamar.dok_10,
            daftar_pelamar.dok_11,
            daftar_pelamar.dok_12,
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
            profil_pelamar.alamat_domisili,
            profil_pelamar.bidang_pendidikan,
            profil_pelamar.jenjang_pendidikan,
            profil_pelamar.universitas_sekolah,
            profil_pelamar.program_studi_jurusan,
            profil_pelamar.ipk,
            profil_pelamar.nama_perusahaan,
            profil_pelamar.jabatan,
            profil_pelamar.tahun_masuk,
            profil_pelamar.tahun_keluar,
            profil_pelamar.foto_profil,
            kabupaten.kabid,
            kabupaten.kabupaten
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

  public function lulusData(){
    date_default_timezone_set("Asia/Jakarta");
    $id = $this->input->post('id_pelamar');
    $data = array('status_akhir' => 'Lulus');

    $this->db->where('id_pelamar', $id);
    $result = $this->db->update('daftar_pelamar', $data);
    return $result;
  }
}
