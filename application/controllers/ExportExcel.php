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
    $this->model_security->getsecurity();
    $WHERE;
     if (isset($_POST['kabid'])) {
       $WHERE = "AND id_kode_daerah = ".$_POST['kabid'];
     }
     else{$WHERE = "";}
    $query = $this->db->query("
        SELECT
        a.no_ktp,
        a.email,
        a.nama,
        a.`status`,
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
        CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS tahun,
        CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%m')+0) AS bulan
        FROM
        data_pendukung b, users a, daftar_pelamar c, profil_pelamar d, kabupaten e 
        WHERE a.`status` = 'aktif' 
        AND b.id_user = c.id_user 
        AND a.id_user = c.id_user 
        AND a.id_user = b.id_user 
        AND a.id_user = d.id_user 
        AND d.kabid = e.kabid 
        $WHERE order by id_user
    "); // fetch Data from table
    $data['allData'] = $query->result_array(); // this will return all data into array
      if (isset($_POST['kabid'])) {
          if ($query->result_array() == TRUE) {
            $judul = $data['allData'][0]['kabupaten'];
            $data['kabid'] = $_POST['kabid'];
          }
          else{
            $this->db->where('kabid', $_POST['kabid']);
            $row = $this->db->get('kabupaten');
            $hasil = $row->row_array();
            $data['kabid'] = $hasil['kabid'];
            $data['allData'] = 'No Data Found';
            $judul = $hasil['kabupaten'];
          }
          $data['judul'] = $judul;
          $this->load->view('excelform/laporan_kab-kota',$data);
      }
      else{
        $data['judul'] = "Keseluruhan";
        $this->load->view('excelform/laporan_lengkap',$data);
      }
  }

  public function ExportDataPribadi()
  {
    $this->model_security->getsecurity();
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
    "); // fetch Data from table
    $data['allData'] = $query->row_array(); // this will return all data into array
    $data['judul'] = 'Data Pribadi';
    $this->load->view('excelform/dataPribadi',$data);
  }    
}
// Nothin
  // $dataToExports = [];
  // foreach ($allData as $data) {
  //  $arrangeData['No Registrasi'] = $data['no_registrasi'];
  //  $arrangeData['Nama Pelamar'] = $data['nama'];
  //  // $arrangeData['Jumlah Barang'] = $data['jumlah_barang'];
  //  $arrangeData['Kota / Kabupaten'] = $data['kabupaten'];
  //  $arrangeData['No. Hp'] = $data['no_hp'];
  //  $arrangeData['Syarat Admin 1'] = $data['syarat_administrasi_1'];
  //  $arrangeData['Syarat Admin 2'] = $data['syarat_administrasi_2'];
  //  $arrangeData['Pas Foto'] = $data['foto_profil'];
  //  $arrangeData['KTP'] = $data['ktp'];
  //  $arrangeData['Ijazah'] = $data['ijazah'];
  //  $arrangeData['SKCK'] = $data['skck'];
  //  $arrangeData['KK'] = $data['kk'];
  //  $arrangeData['Doc 1'] = $data['dok_1'];
  //  $arrangeData['Doc 2'] = $data['dok_2'];
  //  $arrangeData['Doc 3'] = $data['dok_3'];
  //  $arrangeData['Doc 4'] = $data['dok_4'];
  //  $arrangeData['Doc 5'] = $data['dok_5'];
  //  $arrangeData['Doc 6'] = $data['dok_6'];
  //  $arrangeData['Doc 7'] = $data['dok_7'];
  //  $arrangeData['Doc 8'] = $data['dok_8'];
  //  $arrangeData['Doc 9'] = $data['dok_9'];
  //  $arrangeData['Doc 10'] = $data['dok_10'];
  //  $arrangeData['Doc 11'] = $data['dok_11'];
  //  $arrangeData['Doc 12'] = $data['dok_12'];
  //  $dataToExports[] = $arrangeData;
  // }

  // set header
  // $tgl = date('d-m-Y');
  // $filename = "Data Laporan Pelamar ".$tgl.".xls";
  //               header("Content-Type: application/vnd.ms-excel");
  //               header("Content-Disposition: attachment; filename=\"$filename\"");
  // $this->exportExcelData($dataToExports);
 // }

  // function exportKabupaten()
  // {
  //   $this->model_security->getsecurity();
  // $WHERE;
  //  if (isset($_POST['kabid'])) {
  //    $WHERE = "AND id_kode_daerah = ".$_POST['kabid'];
  //  }
  //  else{$WHERE = "";}
  // $query = $this->db->query("
  //     SELECT
  //     a.no_ktp,
  //     a.email,
  //     a.nama,
  //     a.`status`,
  //     b.tgl_insert,
  //     b.tgl_update,
  //     b.penghargaan_kepemiluan,
  //     b.karyatulis_kepemiluan,
  //     b.dok_pendukung_1,
  //     b.dok_pendukung_2,
  //     b.dok_pendukung_3,
  //     b.dok_pendukung_4,
  //     b.ktp,
  //     b.ijazah,
  //     b.skck,
  //     b.kk,
  //     c.id_pelamar,
  //     c.id_job_vacancy,
  //     c.tgl_update,
  //     c.syarat_administrasi_1,
  //     c.syarat_administrasi_2,
  //     c.dok_1,
  //     c.dok_2,
  //     c.dok_3,
  //     c.dok_4,
  //     c.status_akhir,
  //     d.id_user,
  //     d.no_registrasi,
  //     d.id_kode_daerah,
  //     d.email,
  //     d.no_ktp,
  //     d.nama,
  //     d.nama_panggil,
  //     d.tgl_lahir,
  //     d.tempat_lahir,
  //     d.jenis_kelamin,
  //     d.no_hp,
  //     d.agama,
  //     d.status_pernikahan,
  //     d.alamat_ktp,
  //     d.propid,
  //     d.kabid,
  //     d.camatid,
  //     d.kode_pos,
  //     d.alamat_domisili,
  //     d.bidang_pendidikan,
  //     d.jenjang_pendidikan,
  //     d.universitas_sekolah,
  //     d.program_studi_jurusan,
  //     d.ipk,
  //     d.nama_perusahaan,
  //     d.jabatan,
  //     d.tahun_masuk,
  //     d.tahun_keluar,
  //     d.foto_profil,
  //     e.kabid,
  //     e.kabupaten,
  //     CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%Y')+0) AS tahun,
  //     CONCAT(DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(), tgl_lahir)), '%m')+0) AS bulan
  //     FROM
  //     data_pendukung b, users a, daftar_pelamar c, profil_pelamar d, kabupaten e 
  //     WHERE a.`status` = 'aktif' 
  //     AND b.id_user = c.id_user 
  //     AND a.id_user = c.id_user 
  //     AND a.id_user = b.id_user 
  //     AND a.id_user = d.id_user 
  //     AND d.kabid = e.kabid 
  //     $WHERE order by id_user
  // "); // fetch Data from table
  // $data['allData'] = $query->result_array(); // this will return all data into array
  //   if (isset($_POST['kabid'])) {
  //       if ($query->result_array() == TRUE) {
  //         $judul = $data['allData'][0]['kabupaten'];
  //       }
  //       else{
  //         $this->db->where('kabid', $_POST['kabid']);
  //         $row = $this->db->get('kabupaten');
  //         $hasil = $row->row_array();
  //         $judul = $hasil['kabupaten'];
  //         $data['kabid'] = $hasil['kabid'];
  //         $data['allData'] = 'No Data Found';
  //       }
  //       $data['judul'] = $judul;
  //       $this->load->view('excelform/laporan_kab-kota',$data);
  //   }
  // }
 // public function pemasukanDana(){
 //   $query = $this->db->query('SELECT
 //        tb_kencleng.jenis_uang,
 //        tb_kencleng.nama_donatur,
 //        tb_kencleng.jumlah,
 //        tb_kencleng.tanggal
 //        FROM
 //        tb_kencleng ORDER BY tanggal DESC
 //        ');
 //  $allData = $query->result_array();  // this will return all data into array
 //  $dataToExports = [];
 //  foreach ($allData as $data) {
 //    if ($data['jenis_uang'] == 'kencleng_shubuh') {
 //      $jenis_uang = 'Kencleng Shubuh';
 //    } else if ($data['jenis_uang'] == 'kencleng_sore') {
 //      $jenis_uang = 'Kencleng Sore';
 //    } else if ($data['jenis_uang'] == 'kencleng_malam') {
 //      $jenis_uang = 'Kencleng Malam';
 //    } else if ($data['jenis_uang'] == 'kencleng_hadji') {
 //      $jenis_uang = 'Kencleng Hadji';
 //    } else if ($data['jenis_uang'] == 'kencleng_bulanan') {
 //      $jenis_uang = 'Kencleng Bulanan';
 //    }
 //   $arrangeData['JENIS UANG'] = $jenis_uang;
 //   $arrangeData['NAMA DONATUR'] = $data['nama_donatur'];
 //   $arrangeData['JUMLAH'] = $data['jumlah'];
 //   $arrangeData['TANGGAL'] = date('d-m-Y', strtotime($data['tanggal']));
 //   $dataToExports[] = $arrangeData;
 //  }
 //  // set header
 //  $tgl = date('d-m-Y');
 //  $filename = "Data Pemasukan Dana ".$tgl.".xls";
 //                header("Content-Type: application/vnd.ms-excel");
 //                header("Content-Disposition: attachment; filename=\"$filename\"");
 //  $this->exportExcelData($dataToExports);
 // }
// nothin
    
