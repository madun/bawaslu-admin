<?php 
	$tgl = date('d-m-Y');
	
	$i = 1;

    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>BAWASLU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/custome.css">
    <!--Import Google Icon Font-->
    <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>assets/materialize/fonts/fonts.css" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->

    <!-- datatable -->
    <!-- <link href="<?php echo base_url(); ?>assets/datatable/css/bootstrap4.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url(); ?>assets/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  </head>
  <body>
  <div class="row">
    <div class="col l12">
    	<div class="col l9">
    		<p style="font-size: 22pt;"><b>Laporan Data Pelamar Bawaslu Jabar <?php echo $judul." ".$tgl;?></b></p>
        <p style="float: right;"><form method="POST" action="<?php echo base_url('ExportExcel/pelamarGeneral');?>">
        <button type="submit" class="waves-effect waves-light btn right" name="cetak"
        <?php 
        if(isset($_POST['cetak'])){
        echo "style='display:none;'";
        $filename = "Laporan Data Pelamar ".$judul." ".$tgl.".xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
      }?>><i class="fa fa-file-excel-o"></i>
      </button>
      </form></p>
        <p style="font-size: 16pt;">Nama Admin : <b><?php echo $_SESSION['user']['nama'] ;?></b></p>  
    	</div>
    	<div class="col l3">
    	
    	</div>
    </div>

    <div class="col l12">
  	<table id="dt-pelamar" class="mdl-data-table responsive-table striped" border="1" width="100%" cellspacing="0">
      <thead>
        <tr>
        	<th>No.</th>
            <th>ID User</th>
            <th>No Registrasi</th>
            <th>Nama Pelamar</th>
            <th>Kota/Kab</th>
            <th>Gender</th>
            <th>No. HP</th>
            <th>Syarat 1</th>
            <th>Syarat 2</th>
            <th>Pas Foto</th>
            <th>KTP</th>
            <th>Ijazah</th>
            <th>SKCK</th>
            <th>KK</th>
            <th>Dok. 1</th>
            <th>Dok. 2</th>
            <th>Dok. 3</th>
            <th>Dok. 4</th>
            <!-- <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th> -->
            <th>Status Akhir</th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach ($allData as $data) {?>
      		<tr>
      			<td><?php echo $i++ ?></td>
	  			<td><?php echo $data['id_user'];?></td>
	  			<td><?php echo $data['no_registrasi'];?></td>
	  			<td><?php echo $data['nama'];?></td>
	  			<td><?php echo $data['kabupaten'];?></td>
          <td><?php echo $data['jenis_kelamin'];?></td>
	  			<td><?php echo "(+62) ".substr($data['no_hp'], 1, 15);?></td>
	  			<td><?php if($data['tahun'] >= 30 )
                {echo "Terpenuhi";} else {echo "Tidak Terpenuhi";}?></td>
	  			<td><?php if($data['jenjang_pendidikan'] == 'S1' || $data['jenjang_pendidikan'] == 'S2' || $data['jenjang_pendidikan'] == 'S3' ){echo "Terpenuhi";} else {echo "Tidak Terpenuhi";}?></td>
	  			<td><?php if ($data['foto_profil'] == '' || $data['foto_profil'] == null){echo "";}else{echo "<b>T</b>";}?></td>
	  			<td><?php if ($data['ktp'] == '' || $data['ktp'] == null){echo "";}else{echo "<b>T</b>";}?></td>
	  			<td><?php if ($data['ijazah'] == '' || $data['ijazah'] == null){echo "";}else{echo "<b>T</b>";}?></td>
	  			<td><?php if ($data['skck'] == '' || $data['skck'] == null){echo "";}else{echo "<b>T</b>";}?></td>
	  			<td><?php if ($data['kk'] == '' || $data['kk'] == null){echo "";}else{echo "<b>T</b>";}?></td>
	  			<td><?php if ($data['dok_pendukung_1'] == '' || $data['dok_pendukung_1'] == null){echo "";}else{echo "<b>T</b>";}?></td>
	  			<td><?php if ($data['dok_pendukung_2'] == '' || $data['dok_pendukung_2'] == null){echo "";}else{echo "<b>T</b>";}?></td>
	  			<td><?php if ($data['dok_pendukung_3'] == '' || $data['dok_pendukung_3'] == null){echo "";}else{echo "<b>T</b>";}?></td>
	  			<td><?php if ($data['dok_pendukung_4'] == '' || $data['dok_pendukung_4'] == null){echo "";}else{echo "<b>T</b>";}?></td>
	  			<td><?php if ($data['status_akhir']== 'Lulus'){echo "Lulus";}
              elseif($data['status_akhir'] == null){ echo "";}
              else{ echo "Tidak Lulus";}?></td>


          <!-- <td><?php if ($data['dok_pendukung_5'] == '' || $data['dok_pendukung_5'] == null){echo "";}else{echo "<b>T</b>";}?></td>
          <td><?php if ($data['dok_pendukung_6'] == '' || $data['dok_pendukung_6'] == null){echo "";}else{echo "<b>T</b>";}?></td>
          <td><?php if ($data['dok_pendukung_7'] == '' || $data['dok_pendukung_7'] == null){echo "";}else{echo "<b>T</b>";}?></td>
          <td><?php if ($data['dok_pendukung_8'] == '' || $data['dok_pendukung_8'] == null){echo "";}else{echo "<b>T</b>";}?></td>
          <td><?php if ($data['dok_pendukung_9'] == '' || $data['dok_pendukung_9'] == null){echo "";}else{echo "<b>T</b>";}?></td>
          <td><?php if ($data['dok_pendukung_10'] == '' || $data['dok_pendukung_10'] == null){echo "";}else{echo "<b>T</b>";}?></td>
          <td><?php if ($data['dok_pendukung_11'] == '' || $data['dok_pendukung_11'] == null){echo "";}else{echo "<b>T</b>";}?></td>
          <td><?php if ($data['dok_pendukung_12'] == '' || $data['dok_pendukung_12'] == null){echo "";}else{echo "<b>T</b>";}?></td> -->
          </tr>
      	<?php } ?>
      </tbody>
  	</table>
    <br/>
    <table>
      <tr>
        <td>Keterangan</td>
        <td colspan="4">:</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Syarat 1</td>
        <td>:</td>
        <td colspan="2">Umur Minimum Pelamar 30 Tahun</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Syarat 2</td>
        <td>:</td>
        <td colspan="2">Pendidikan Minimum Pelamar S1 Sederajat</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Dok. 1</td>
        <td>:</td>
        <td colspan="2">Surat Pendaftaran Pelamar Sebagai Calon Anggota Panwas</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Dok. 2</td>
        <td>:</td>
        <td colspan="2">Daftar Riwayat Hidup Pelamar</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Dok. 3</td>
        <td>:</td>
        <td colspan="2">Surat Pernyataan Pelamar</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Dok. 4</td>
        <td>:</td>
        <td colspan="2">Surat Keterangan Dari Pengurus Partai Politik, Bagi Pelamar yang Pernah Menjadi Anggota Parpol</td>
      </tr>
    </table>
    </div>
  </div>
  </body>
  </html>