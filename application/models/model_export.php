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
            d.no_registrasi,
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
            d.status_akhir,
            e.kabid,
            e.kabupaten,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS tahun,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%m')+0) AS bulan
            FROM users a, data_pendukung b, profil_pelamar d, kabupaten e
            WHERE a.status = 'aktif'
            AND a.id_user = b.id_user
            AND b.id_user = d.id_user 
            AND d.kabid = e.kabid
        $WHERE order by id_user
    "); // fetch Data from table
    return $query->result_array();
  }
  
  function dataPribadi()
  {
  	$no_reg = $this->input->post('no_reg');
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
            d.no_registrasi,
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
            d.status_akhir,
            e.kabid,
            e.kabupaten,
            f.kecamatan,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS tahun,
            CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%m')+0) AS bulan
            FROM users a, data_pendukung b, profil_pelamar d, kabupaten e, kecamatan f
            WHERE a.status = 'aktif'
            AND a.id_user = b.id_user
            AND b.id_user = d.id_user 
            AND d.kabid = e.kabid
            AND d.camatid = f.camatid
      AND d.no_registrasi = '".$no_reg."'
    "); 
    return $query->row_array();
  }
  function persentase(){
    $sqlkab = "
    SELECT C.kabupaten as daerah,
    COUNT(C.kabid) as data,
    SUM(P.jenis_kelamin = 'Laki-laki') as laki,
    SUM(P.jenis_kelamin = 'Perempuan') as perempuan,
    SUM(P.jenjang_pendidikan = 'SMA') as SMA,
    SUM(P.jenjang_pendidikan = 'D3') as D3,
    SUM(P.jenjang_pendidikan = 'S1') as S1,
    SUM(P.jenjang_pendidikan = 'S2') as S2
    FROM
    profil_pelamar P, kabupaten C
    WHERE P.id_kode_daerah = C.kabid
    GROUP BY P.id_kode_daerah, C.kabupaten
              ";
    $hasil= $this->db->query($sqlkab);
    $result = $hasil->result_array();
    return $result;
  }

}