<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExportExcel extends CI_Controller {

 function __construct()
 {
  parent::__construct();
  $this->load->database();
  //$this->load->model('Model_asettetap');
 }


 public function exportExcelData($records)
 {
  $heading = false;
        if (!empty($records))
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", ($row)) . "\n";
            }
 }

 public function pelamarGeneral()
 {
  // $WHERE;
  //  if (isset($_POST['where'])) {
  //    $WHERE = " AND kabid = '3200' ";
  //  } else if (condition) {
  //    # code...
  //  }
  $query = $this->db->query('
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
      daftar_pelamar.id_pelamar,
      daftar_pelamar.id_job_vacancy,
      daftar_pelamar.tgl_update,
      daftar_pelamar.no_registrasi,
      daftar_pelamar.syarat_administrasi_1,
      daftar_pelamar.syarat_administrasi_2,
      daftar_pelamar.ktp,
      daftar_pelamar.ijazah,
      daftar_pelamar.skck,
      daftar_pelamar.kk,
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
  '); // fetch Data from table
  $allData = $query->result_array();  // this will return all data into array
  $dataToExports = [];
  foreach ($allData as $data) {
   $arrangeData['No Registrasi'] = $data['no_registrasi'];
   $arrangeData['Nama Pelamar'] = $data['nama'];
   // $arrangeData['Jumlah Barang'] = $data['jumlah_barang'];
   $arrangeData['Kota / Kabupaten'] = $data['kabupaten'];
   $arrangeData['No. Hp'] = $data['no_hp'];
   $arrangeData['Syarat Admin 1'] = $data['syarat_administrasi_1'];
   $arrangeData['Syarat Admin 2'] = $data['syarat_administrasi_2'];
   $arrangeData['Pas Foto'] = $data['foto_profil'];
   $arrangeData['KTP'] = $data['ktp'];
   $arrangeData['Ijazah'] = $data['ijazah'];
   $arrangeData['SKCK'] = $data['skck'];
   $arrangeData['KK'] = $data['kk'];
   $arrangeData['Doc 1'] = $data['dok_1'];
   $arrangeData['Doc 2'] = $data['dok_2'];
   $arrangeData['Doc 3'] = $data['dok_3'];
   $arrangeData['Doc 4'] = $data['dok_4'];
   $arrangeData['Doc 5'] = $data['dok_5'];
   $arrangeData['Doc 6'] = $data['dok_6'];
   $arrangeData['Doc 7'] = $data['dok_7'];
   $arrangeData['Doc 8'] = $data['dok_8'];
   $arrangeData['Doc 9'] = $data['dok_9'];
   $arrangeData['Doc 10'] = $data['dok_10'];
   $arrangeData['Doc 11'] = $data['dok_11'];
   $arrangeData['Doc 12'] = $data['dok_12'];
   $dataToExports[] = $arrangeData;
  }
  // set header
  $tgl = date('d-m-Y');
  $filename = "Data Laporan Pelamar ".$tgl.".xls";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }

 public function pemasukanDana(){
   $query = $this->db->query('SELECT
        tb_kencleng.jenis_uang,
        tb_kencleng.nama_donatur,
        tb_kencleng.jumlah,
        tb_kencleng.tanggal
        FROM
        tb_kencleng ORDER BY tanggal DESC
        ');
  $allData = $query->result_array();  // this will return all data into array
  $dataToExports = [];
  foreach ($allData as $data) {
    if ($data['jenis_uang'] == 'kencleng_shubuh') {
      $jenis_uang = 'Kencleng Shubuh';
    } else if ($data['jenis_uang'] == 'kencleng_sore') {
      $jenis_uang = 'Kencleng Sore';
    } else if ($data['jenis_uang'] == 'kencleng_malam') {
      $jenis_uang = 'Kencleng Malam';
    } else if ($data['jenis_uang'] == 'kencleng_hadji') {
      $jenis_uang = 'Kencleng Hadji';
    } else if ($data['jenis_uang'] == 'kencleng_bulanan') {
      $jenis_uang = 'Kencleng Bulanan';
    }
   $arrangeData['JENIS UANG'] = $jenis_uang;
   $arrangeData['NAMA DONATUR'] = $data['nama_donatur'];
   $arrangeData['JUMLAH'] = $data['jumlah'];
   $arrangeData['TANGGAL'] = date('d-m-Y', strtotime($data['tanggal']));
   $dataToExports[] = $arrangeData;
  }
  // set header
  $tgl = date('d-m-Y');
  $filename = "Data Pemasukan Dana ".$tgl.".xls";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
  $this->exportExcelData($dataToExports);
 }
}
