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
    		<p style="font-size: 22pt"><b>Laporan <?php echo $judul." Pelamar ".$tgl;?></b></p>
        <p style="font-size: 16pt">Nama Admin : <b><?php echo $_SESSION['user']['nama'] ;?></b></p>
    	</div>
    	
    </div>

    <div class="col l9">
    <div class="col l9">
      <table class="" width="70%" border="1">
        <thead>
          <th><b>DAERAH</b></th>
          <th><b>J. Pelamar/Daerah</b></th>
          <th><b>J. Pelamar Laki-laki</b></th>
          <th><b>J. Pelamar Perempuan</b></th>
          <th><b>J. Pelamar SMA</b></th>
          <th><b>J. Pelamar D3</b></th>
          <th><b>J. Pelamar S1</b></th>
          <th><b>J. Pelamar S2</b></th>
        </thead>
        <?php $total = 0;
        foreach ($points as $poin) {?>
        <tbody>
            <tr>
              <td><center><?php echo $poin['daerah'];?></center></td>
              <td><center><?php echo $poin['data'];?></center></td>
              <td><center>[<?php echo $poin['laki'];?>]</center></td>
              <td><center>[<?php echo $poin['perempuan'];?>]</center></td>
              <td><center>[<?php echo $poin['SMA'];?>]</center></td>
              <td><center>[<?php echo $poin['D3'];?>]</center></td>
              <td><center>[<?php echo $poin['S1'];?>]</center></td>
              <td><center>[<?php echo $poin['S2'];?>]</center></td>
            </tr>
          </tbody>
          <?php $total = $total + $poin['data'];
              } ?>
          <th colspan="7" style="font-size: 15pt;"><center><b>Jumlah Total Pelamar : <?php echo $total ;?> Pelamar</b></center></th>
          </table>
      </div>
    </div>
  </div>
</body>
</html>