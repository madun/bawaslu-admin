<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_export extends CI_Model {

  public function getData(){

  	$WHERE;
     if (isset($_POST['kabid'])) {
       $WHERE = "AND id_kode_daerah = ".$_POST['kabid'];
     }
     else{$WHERE = "";}
    $query = $this->db->query("
        SELECT a.no_ktp,
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
        $WHERE order by id_user
    "); // fetch Data from table
    return $query->result_array();
  }
  
  function dataPribadi()
  {
  	$no_reg = $this->input->post('no_reg');
    $query = $this->db->query("
      SELECT
      a.no_ktp,
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
      c.syarat_administrasi_1,
      c.syarat_administrasi_2,
      c.dok_1,
      c.dok_2,
      c.dok_3,
      c.dok_4,
      c.status_akhir,
      d.id_user,
      d.no_registrasi,
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
      d.alamat_domisili,
      d.bidang_pendidikan,
      d.jenjang_pendidikan,
      d.universitas_sekolah,
      d.program_studi_jurusan,
      d.ipk,
      d.nama_perusahaan,
      d.jabatan,
      d.tahun_masuk,
      d.tahun_keluar,
      d.foto_profil,
      e.kabupaten,
      f.kecamatan,
      CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS tahun,
      CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%m')+0) AS bulan
      FROM
      data_pendukung b, users a, daftar_pelamar c, profil_pelamar d, kabupaten e, kecamatan f 
      WHERE a.status = 'aktif' 
      AND b.id_user = c.id_user 
      AND a.id_user = c.id_user 
      AND a.id_user = b.id_user 
      AND a.id_user = d.id_user 
      AND d.kabid = e.kabid
      AND d.camatid = f.camatid
      AND d.no_registrasi = '".$no_reg."' order by id_user
    "); 
    return $query->row_array();
  }

}