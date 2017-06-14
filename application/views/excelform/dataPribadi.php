<?php 
	$tgl = date('d-m-Y');
	
	$i = 1;
  $filename = $judul." ".$tgl.".xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>BAWASLU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custome.css"> -->
    <!--Import Google Icon Font-->
    <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!-- <link href="<?php echo base_url(); ?>assets/materialize/fonts/fonts.css" rel="stylesheet"> -->
    <!--Let browser know website is optimized for mobile-->

    <!-- datatable -->
    <!-- <link href="<?php echo base_url(); ?>assets/datatable/css/bootstrap4.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url(); ?>assets/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
      table,th,td{
        border: 1px solid grey !Important ; 
      }
    </style>

</head>
<body>
<div class="row">
    <div class="col l12" style="margin-bottom: 20px;">
    	<div class="col l9">
    		<h4 style="font-size: 20pt"><b>Laporan <?php echo $judul." Pelamar ".$tgl;?></b></h4>
        <h6 style="font-size: 17pt">Nama Admin : <b><?php echo $_SESSION['user']['nama'] ;?></b></h6>
    	</div>
    	
    </div>

    <div class="col l9">
      <div class="col l9">
      <table class="" width="70%" border="1" >
        <tr>
          <th colspan="3" style="font-size: 17pt"><h6><b>DATA PELAMAR</b></h6></th>
        </tr>
        <!-- <input type="text" id="id_pelamar" name="id_pelamar" value=""> -->
          <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?php echo $allData['nama'];?></td>
          </tr>
          <tr>
            <td>No. Registrasi</td>
            <td>:</td>
            <td><?php echo $allData['no_registrasi'];?></td>
          </tr>
          <tr>
            <td>ID User</td>
            <td>:</td>
            <td>[<?php echo $allData['id_user'];?>]</td>
          </tr>
          <tr>
            <td>Usia </td>
            <td>:</td>
            <td><?php echo $allData['tahun']." Tahun ".$allData['bulan']." Bulan";?></td>
          </tr
          <tr>
            <td>No. Handphone</td>
            <td>:</td>
            <td><?php echo "(+62) ".substr($allData['no_hp'], 1, 15);?></td>
          </tr>
          <tr>
            <td>Tanggal Daftar</td>
            <td>:</td>
            <td><?php echo $allData['tgl_insert'];?></td>
          </tr>
          <tr>
            <td>Kota/Kab. Pelamar</td>
            <td>:</td>
            <td><?php echo $allData['kabupaten'];?></td>
          </tr>
              
        </table>
        <table>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
        <br>
      </div>
      <div class="col l12">
      <table class="responsive-table striped" width="100%" border="1">

      <tr>
        <th colspan="5" style="font-size: 17pt"><center><h6><b>DATA PRIBADI</b></h6></center></th>
      </tr>

        <tr>
          <td>Nama Lengkap</td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['nama'];?></td>
        </tr>
        <tr>
          <td>No. KTP</td>
          <td>:</td>
          <td colspan="3">[<?php echo $allData['no_ktp'];?>]</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['email'];?></td>
        </tr>
        <tr>
          <td>Tempat, Tanggal lahir/Usia </td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['tempat_lahir'].", ".$allData['tgl_lahir']." / ".$allData['tahun']." Tahun ".$allData['bulan']." Bulan";?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['jenis_kelamin'];?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['alamat_ktp'].", Kec. ".$allData['kecamatan'].", ".$allData['kabupaten'].", ".$allData['kode_pos'];?></td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['agama'];?></td>
        </tr>
        <tr>
          <td>Pendidikan Terakhir</td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['jenjang_pendidikan']." ".$allData['bidang_pendidikan'];?></td>
        </tr>
        <tr>
          <td>Status Pernikahan</td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['status_pernikahan'];?></td>
        </tr>
      <tr>
        <th colspan="5" style="font-size: 17pt"><center><h6><b>DATA PERSYARATAN PELAMAR</b></h6></center></th>
      </tr>
        <tr>
          <td>Syarat Adm 1 (Umur)</td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['syarat_administrasi_1'];?></td>
        </tr>
        <tr>
          <td>Syarat Adm 2 (Pendidikan)</td>
          <td>:</td>
          <td colspan="3"><?php echo $allData['syarat_administrasi_2'];?></td>
        </tr>
        <tr>
          <td>Pas Foto</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['foto_profil'] != null) {echo "Lengkap";} else {echo "Tidak Lengkap";}?></td>
        </tr>
        <tr>
          <td>KTP</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['ktp'] != null) {echo "Lengkap";} else {echo "Tidak Lengkap";}?></td>
        </tr>
        <tr>
          <td>Ijazah</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['ijazah'] != null) {echo "Lengkap";} else {echo "Tidak Lengkap";}?></td>
        </tr>
        <tr>
          <td>SKCK</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['skck'] != null) {echo "Lengkap";} else {echo "Tidak Lengkap";}?></td>
        </tr>
        <tr>
          <td>KK</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['kk'] != null) {echo "Lengkap";} else {echo "Tidak Lengkap";}?></td>
        </tr>
      <tr>
        <th colspan="5" style="font-size: 17pt"><center><h6><b>DATA PENDUKUNG</b></h6></center></th>
      </tr>
        <tr>
          <td>Penghargaan Kepemiluan</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['penghargaan_kepemiluan'] != null) {echo "Ada";} else {echo "Tidak Ada";}?></td>
        </tr>
        <tr>
          <td>Karya Tulis</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['karyatulis_kepemiluan'] != null) {echo "Ada";} else {echo "Tidak Ada";}?></td>
        </tr>
        <tr>
          <td>Doc. Pendukung 1</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['dok_pendukung_1'] != null) {echo "Lengkap";} else {echo "Tidak Lengkap";}?></td>
        </tr>
        <tr>
          <td>Doc. Pendukung 2</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['dok_pendukung_2'] != null) {echo "Lengkap";} else {echo "Tidak Lengkap";}?></td>
        </tr>
        <tr>
          <td>Doc. Pendukung 3</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['dok_pendukung_5'] != null) {echo "Lengkap";} else {echo "Tidak Lengkap";}?></td>
        </tr>
        <tr>
          <td>Doc. Pendukung 4</td>
          <td>:</td>
          <td colspan="3"><?php if ($allData['dok_pendukung_4'] != null) {echo "Lengkap";} else {echo "Tidak Lengkap";}?></td>
        </tr>
        <tr>
          <td colspan="5" style="font-size: 15pt"><center><b>Status Akhir : <?php echo $allData['status_akhir'];?></b></center></td>
        </tr>
      </table>
      </div>
  </div>

</div>
</body>
</html>