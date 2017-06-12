<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>JOB VACANCIES</title>
    <style media="screen">
      /*toast*/
      #toast-container {
        top: auto !important;
        right: auto !important;
        bottom: 80%;
        left:40%;
      }
    </style>
  </head>
  <body>
    <!-- Modal Structure -->
    <div id="modalPelamar" class="modal">
      <div class="modal-content">
          <center><h6>DATA PRIBADI</h6></center>
          <br>
          <div class="row">
            <!-- <input type="text" id="id_pelamar" name="id_pelamar" value=""> -->
            <table class="responsive-table striped">
              <tr>
                <td>Nama</td>
                <td><b><span id="nama"></span></b></td>
              </tr>
              <tr>
                <td>No. KTP</td>
                <td><b><span id="no_ktp" ></span></b></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><b><span id="email"></span></b></td>
              </tr>
              <tr>
                <td>No. HP</td>
                <td><b><span id="no_hp"></span></b></td>
              </tr>
              <tr>
                <td>Tempat, Tanggal lahir/Usia </td>
                <td><b><span id="tempat_lahir"></span>, <span id="tgl_lahir"></span></b></td>
              </tr>
              <tr>
                <td>Status Pernikahan</td>
                <td><b><span id="status_pernikahan"></span></b></td>
              </tr>
            </table>
          </div>
          <center><h6>DATA PELAMAR</h6></center>
          <br>
          <div class="row">
            <!-- <input type="text" id="id_pelamar" name="id_pelamar" value=""> -->
            <table class="responsive-table striped">
              <tr>
                <td>Nama </td>
                <td><b><span id="nama"></span></b></td>
              </tr>
              <tr>
                <td>No. Registrasi</td>
                <td><b><span id="noregis"></span></b></td>
              </tr>
              <tr>
                <td>Syarat Adm 1</td>
                <td><b><span id="syarat1"></span></b></td>
              </tr>
              <tr>
                <td>Syarat Adm 2</td>
                <td><b><span id="syarat2"></span></b></td>
              </tr>
              <tr>
                <td>Pas Foto</td>
                <td><a href="#" id="fotolink"><b><span id="pas_foto"></span></b></a></td>
              </tr>
              <tr>
                <td>KTP</td>
                <td><a href="#" id="ktplink"><b><span id="ktp"></span></b></a></td>
              </tr>
              <tr>
                <td>Ijazah</td>
                <td><a href="#" id="ijazahlink"><b><span id="ijazah"></span></b></a></td>
              </tr>
              <tr>
                <td>SKCK</td>
                <td><a href="#" id="skcklink"><b><span id="skck"></span></b></a></td>
              </tr>
              <tr>
                <td>KK</td>
                <td><a href="#" id="kklink"><b><span id="kk"></span></b></a></td>
              </tr>
              <tr>
                <td>Status Akhir</td>
                <td><b><span id="status_akhir" class="right"></span></b></td>
              </tr>
            </table>
          </div>
          <center><h6>DATA PENDUKUNG</h6></center>
          <br>
          <div class="row">
            <!-- <input type="text" id="id_pelamar" name="id_pelamar" value=""> -->
            <table class="responsive-table striped">
              <tr>
                <td>Penghargaan Kepemiluan</td>
                <td><a href="#" id="penghargaanlink"><b><span id="penghargaan"></span></b></a></td>
              </tr>
              <tr>
                <td>Karya Tulis</td>
                <td><a href="#" id="karyatulislink"><b><span id="karyatulis"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 1</td>
                <td><a href="#" id="dok_pendukung_1"><b><span id="dok_pend_1"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 2</td>
                <td><a href="#" id="dok_pendukung_2"><b><span id="dok_pend_2"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 3</td>
                <td><a href="#" id="dok_pendukung_3"><b><span id="dok_pend_3"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 4</td>
                <td><a href="#" id="dok_pendukung_4"><b><span id="dok_pend_4"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 5</td>
                <td><a href="#" id="dok_pendukung_5"><b><span id="dok_pend_5"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 6</td>
                <td><a href="#" id="dok_pendukung_6"><b><span id="dok_pend_6"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 7</td>
                <td><a href="#" id="dok_pendukung_7"><b><span id="dok_pend_7"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 8</td>
                <td><a href="#" id="dok_pendukung_8"><b><span id="dok_pend_8"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 9</td>
                <td><a href="#" id="dok_pendukung_9"><b><span id="dok_pend_9"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 10</td>
                <td><a href="#" id="dok_pendukung_10"><b><span id="dok_pend_10"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 11</td>
                <td><a href="#" id="dok_pendukung_11"><b><span id="dok_pend_11"></span></b></a></td>
              </tr>
              <tr>
                <td>Doc. Pendukung 12</td>
                <td><a href="#" id="dok_pendukung_12"><b><span id="dok_pend_12"></span></b></a></td>
              </tr>

            </table>
          </div>
      </div>
      <div class="modal-footer">
        <!-- <button class="modal-action modal-close waves-effect waves-red btn-flat">CLOSE</button> -->
        <!-- <button type="submit" class="simpan modal-action waves-effect waves-green btn-flat">SAVE</button>
        <button onclick="updateData()" class="update modal-action waves-effect waves-green btn-flat" style="display:none;">UPDATE</button> -->
      </div>

    </div>
    <div class="row">
      <form name="filter_kab" action="<?php echo base_url('ExportExcel/pelamarGeneral');?>" method="POST">
      <div class="col l12" style="margin-bottom: 10px;">
        <div class="col l3" style="min-height: 10px; float: right;" >
          <select id="filter" style="display: block; " name="kabid">
            <option value="" disabled selected>FILTER By Kab/Kota</option>
             <?php 
                $inistiate = $this->db->query("SELECT kabid, kabupaten from kabupaten where propid= '3200' AND aktif='y' order by kabupaten");
                $cek = $inistiate->result_array();
                if ($cek == TRUE){
                  foreach ($cek as $x) {?>
                  <option value="<?php echo $x['kabid']; ?>"><?php echo $x['kabupaten']; ?></option>
                <?php
                }
                }?>
            <option value=""></option>
          </select>
          <!-- <label></label> -->
        </div>
      </div>


      <div class="col l6">
      <h5>Laporan Pelamar</h5>
      </div>
      <div class="col l6">
        <!-- <button onclick="clearForm();$('.simpan').show();$('.update').hide();" type="button" class="waves-effect waves-light btn right" name="button" data-target="modalPelamar"><i class="material-icons">add</i></button> -->
        <button type="submit" class="waves-effect waves-light btn right" name="filter">Export To Excel</button>
      </div>
      </form>
      
      <div class="col l12">
        <table id="dt-pelamar" class="mdl-data-table" width="100%" cellspacing="0">
          <thead>
                <tr>
                    <!-- <th>ID Pelamar</th> -->
                    <th>ID User</th>                    
                    <th>ID Job</th>                    
                    <th>No Registrasi</th>
                    <th>Nama Pelamar</th>
                    <th>Kota/Kab</th>
                    <th>No. HP</th>
                    <th>Syarat 1</th>
                    <th>Syarat 2</th>
                    <th>Pas Foto</th>
                    <th>KTP</th>
                    <th>Ijazah</th>
                    <th>SKCK</th>
                    <th>KK</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>Status Akhir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="load_data">

            </tbody>
        </table>
      </div>
    </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-2.1.1.min.js"></script>
  <script type="text/javascript">

    $(document).ready(function(){
      loadData();
      // $('#dt-pengumuman').dataTable();
      $('.modal').modal({
          dismissible: true, // Modal can be dismissed by clicking outside of the modal
          opacity: .8, // Opacity of modal background
          inDuration: 300, // Transition in duration
          outDuration: 200, // Transition out duration
          startingTop: '4%', // Starting top style attribte
          endingTop: '10%', // Ending top style attribute
          ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.

          },
          complete: function() {

          } // Callback for Modal close
        }
      );

      // get id untuk edit
      $(document).on("click",".selectEdit", function(){
          var id_pelamar = $(this).attr('id');
          // STATUS MODAL
          $.ajax({
              type : 'POST',
              data : "id_pelamar="+id_pelamar,
              url : "<?php echo base_url(); ?>pelamar/getIdPelamar",
              success : function(result){
                  $(".simpan").hide();
                  $(".update").show();
                  var resultObj = JSON.parse(result);
                  // ke dalam object

                  clearForm();
                  $.each(resultObj,function(key,val){
                    var syarat1;
                    var syarat2;
                    var syaratdoc;
                    var pas_foto;
                    var ktp;
                    var ijazah;
                    var skck;
                    var kk;
                    var status_akhir;
                    var penghargaan;
                    var karyatulis;
                    var dok_1;
                    var dok_2;
                    var dok_3;
                    var dok_4;
                    var dok_5;
                    var dok_6;
                    var dok_7;
                    var dok_8;
                    var dok_9;
                    var dok_10;
                    var dok_11;
                    var dok_12;

                    if(val.syarat_administrasi_1 == 'Terpenuhi' || val.syarat_administrasi_1 == null){syarat1 = 'Tdk Terpenuhi'} else {syarat1 = 'Terpenuhi'}
                    if(val.syarat_administrasi_2 == 'Terpenuhi' || val.syarat_administrasi_2 == null){syarat2 = 'Tdk Terpenuhi'} else {syarat2 = 'Terpenuhi'}
                    if (val.foto_profil == '' || val.foto_profil == null) {pas_foto = ''} else {pas_foto = 'LENGKAP' }
                    if (val.ktp == '' || val.ktp == null) {ktp = ''} else {ktp = 'LENGKAP' }
                    if (val.ijazah == '' || val.ijazah == null) {ijazah = ''} else {ijazah = 'LENGKAP' }
                    if (val.skck == '' || val.skck == null) {skck = ''} else {skck = 'LENGKAP' }
                    if (val.kk == '' || val.kk == null) {kk = ''} else {kk = 'LENGKAP' }
                    if (val.penghargaan_kepemiluan == '' || val.penghargaan_kepemiluan == null) 
                      {penghargaan = ''} else {penghargaan = 'LENGKAP'}
                    if (val.karyatulis_kepemiluan == '' || val.karyatulis_kepemiluan == null) 
                      {karyatulis = ''} else {karyatulis = 'LENGKAP'}
                    if (val.status_akhir == 'Lulus' || val.status_akhir == null) {status_akhir = 'Lulus'} else {status_akhir = 'Tidak Lulus' }

                    if (val.dok_pendukung_1 == '' || val.dok_pendukung_1 == null) {dok_1 = ''} else {dok_1 = 'LENGKAP'}
                    if (val.dok_pendukung_2 == '' || val.dok_pendukung_2 == null) {dok_2 = ''} else {dok_2 = 'LENGKAP'}
                    if (val.dok_pendukung_3 == '' || val.dok_pendukung_3 == null) {dok_3 = ''} else {dok_3 = 'LENGKAP'}
                    if (val.dok_pendukung_4 == '' || val.dok_pendukung_4 == null) {dok_4 = ''} else {dok_4 = 'LENGKAP'}
                    if (val.dok_pendukung_5 == '' || val.dok_pendukung_5 == null) {dok_5 = ''} else {dok_5 = 'LENGKAP'}
                    if (val.dok_pendukung_6 == '' || val.dok_pendukung_6 == null) {dok_6 = ''} else {dok_6 = 'LENGKAP'}
                    if (val.dok_pendukung_7 == '' || val.dok_pendukung_7 == null) {dok_7 = ''} else {dok_7 = 'LENGKAP'}
                    if (val.dok_pendukung_8 == '' || val.dok_pendukung_8 == null) {dok_8 = ''} else {dok_8 = 'LENGKAP'}
                    if (val.dok_pendukung_9 == '' || val.dok_pendukung_9 == null) {dok_9 = ''} else {dok_9 = 'LENGKAP'}
                    if (val.dok_pendukung_10 == '' || val.dok_pendukung_10 == null) {dok_10 = ''} else {dok_10 = 'LENGKAP'}
                    if (val.dok_pendukung_11 == '' || val.dok_pendukung_11 == null) {dok_11 = ''} else {dok_11 = 'LENGKAP'}
                    if (val.dok_pendukung_12 == '' || val.dok_pendukung_12 == null) {dok_12 = ''} else {dok_12 = 'LENGKAP'}

                    $("[name='id_pelamar']").val(val.id_pelamar);
                    $("b #nama").html(val.nama);
                    $("b #no_ktp").html(val.no_ktp);
                    $("b #email").html(val.email);
                    $("b #no_hp").html(val.no_hp);
                    $("b #tempat_lahir").html(val.tempat_lahir);
                    $("b #tgl_lahir").html(val.tgl_lahir);
                    $("b #status_pernikahan").html(val.status_pernikahan);
                    $("b #noregis").html(val.no_registrasi);
                    $("b #syarat1").html(syarat1);
                    $("b #syarat2").html(syarat2);
                    $("b #pas_foto").html(pas_foto);
                    $("b #ktp").html(ktp);
                    $("b #ijazah").html(ijazah);
                    $("b #skck").html(skck);
                    $("b #kk").html(kk);
                    $("b #dok_pend_1").html(dok_1);
                    $("b #dok_pend_2").html(dok_2);
                    $("b #dok_pend_3").html(dok_3);
                    $("b #dok_pend_4").html(dok_4);
                    $("b #dok_pend_5").html(dok_5);
                    $("b #dok_pend_6").html(dok_6);
                    $("b #dok_pend_7").html(dok_7);
                    $("b #dok_pend_8").html(dok_8);
                    $("b #dok_pend_9").html(dok_9);
                    $("b #dok_pend_10").html(dok_10);
                    $("b #dok_pend_11").html(dok_11);
                    $("b #dok_pend_12").html(dok_12);
                    $("b #penghargaan").html(penghargaan);
                    $("b #karyatulis").html(karyatulis);
                    document.getElementById("fotolink").href=val.foto_profil;
                    document.getElementById("ktplink").href=val.ktp;
                    document.getElementById("ijazahlink").href=val.ijazah;
                    document.getElementById("skcklink").href=val.skck;
                    document.getElementById("kklink").href=val.kk;
                    document.getElementById("penghargaanlink").href=val.penghargaan_kepemiluan;
                    document.getElementById("karyatulislink").href=val.karyatulis_kepemiluan;
                    document.getElementById("dok_pendukung_1").href=val.dok_pendukung_1;
                    document.getElementById("dok_pendukung_2").href=val.dok_pendukung_2;
                    document.getElementById("dok_pendukung_3").href=val.dok_pendukung_3;
                    document.getElementById("dok_pendukung_4").href=val.dok_pendukung_4;
                    document.getElementById("dok_pendukung_5").href=val.dok_pendukung_5;
                    document.getElementById("dok_pendukung_6").href=val.dok_pendukung_6;
                    document.getElementById("dok_pendukung_7").href=val.dok_pendukung_7;
                    document.getElementById("dok_pendukung_8").href=val.dok_pendukung_8;
                    document.getElementById("dok_pendukung_9").href=val.dok_pendukung_9;
                    document.getElementById("dok_pendukung_10").href=val.dok_pendukung_10;
                    document.getElementById("dok_pendukung_11").href=val.dok_pendukung_11;
                    document.getElementById("dok_pendukung_12").href=val.dok_pendukung_12;
                    $("b #status_akhir").html(status_akhir);
                });
              }
              // END STATUS PADA MODAL
          });
      });

    });

    function clearForm(){
      $("[name='id_pelamar']").val("");
      $("b #nama").html("");
      $("b #noregis").html("");
      $("b #syarat1").html("");
      $("b #syarat2").html("");
      $("b #syaratdoc").html("");
      $("b #ktp").html("");
      $("b #ijazah").html("");
      $("b #skck").html("");
      $("b #kk").html("");
      $("b #dok_pendukung_1").html("");
      $("b #dok_pendukung_2").html("");
      $("b #dok_pendukung_3").html("");
      $("b #dok_pendukung_4").html("");
      $("b #dok_pendukung_5").html("");
      $("b #dok_pendukung_6").html("");
      $("b #dok_pendukung_7").html("");
      $("b #dok_pendukung_8").html("");
      $("b #dok_pendukung_9").html("");
      $("b #dok_pendukung_10").html("");
      $("b #dok_pendukung_11").html("");
      $("b #dok_pendukung_12").html("");
      $("b #penghargaan").html("");
      $("b #karyatulis").html("");
      $("b #status_akhir").html("");
    }

    function loadData(){

          var data_here = $('#load_data');
          data_here.html("");
          $.ajax({
              type : 'GET',
              data : '',
              url : '<?php echo base_url(); ?>pelamar/getData',
              success : function(result){
                var resultObj = JSON.parse(result);
                // STATUS DATA PADA TABEL
                //fetch data ke dalam object
                $.each(resultObj,function(key,val){
                    var newRow = $("<tr>");
                    var syarat1;
                    var syarat2;
                    var statusakhir;
                    var pas_foto;
                    if(val.syarat_administrasi_1 == 'Terpenuhi'){syarat1 = 'Terpenuhi'} else {syarat1 = 'Tdk Terpenuhi'}
                    if(val.syarat_administrasi_2 == 'Terpenuhi'){syarat2 = 'Terpenuhi'} else {syarat2 = 'Tdk Terpenuhi'}
                    if (val.foto_profil == '' || val.foto_profil == null) {pas_foto = ''} else {pas_foto = '<i class="fa fa-check"></i>'}
                    if (val.ktp == '' || val.ktp == null) {ktp = ''} else {ktp = '<i class="fa fa-check"></i>'}
                    if (val.ijazah == '' || val.ijazah == null) {ijazah = ''} else {ijazah = '<i class="fa fa-check"></i>'}
                    if (val.skck == '' || val.skck == null) {skck = ''} else {skck = '<i class="fa fa-check">'}
                    if (val.kk == '' || val.kk == null) {kk = ''} else {kk = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_1 == '' || val.dok_pendukung_1 == null ) {dok_1 = ''} else {dok_1 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_2 == '' || val.dok_pendukung_2 == null ) {dok_2 = ''} else {dok_2 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_3 == '' || val.dok_pendukung_3 == null ) {dok_3 = ''} else {dok_3 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_4 == '' || val.dok_pendukung_4 == null ) {dok_4 = ''} else {dok_4 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_5 == '' || val.dok_pendukung_5 == null ) {dok_5 = ''} else {dok_5 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_6 == '' || val.dok_pendukung_6 == null ) {dok_6 = ''} else {dok_6 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_7 == '' || val.dok_pendukung_7 == null ) {dok_7 = ''} else {dok_7 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_8 == '' || val.dok_pendukung_8 == null ) {dok_8 = ''} else {dok_8 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_9 == '' || val.dok_pendukung_9 == null ) {dok_9 = ''} else {dok_9 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_10 == '' || val.dok_pendukung_10 == null ) {dok_10 = ''} else {dok_10 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_11 == '' || val.dok_pendukung_11 == null ) {dok_11 = ''} else {dok_11 = '<i class="fa fa-check"></i>'}
                    if (val.dok_pendukung_12 == '' || val.dok_pendukung_12 == null ) {dok_12 = ''} else {dok_12 = '<i class="fa fa-check"></i>'}
                    // if (val.dok_1 == 'Lengkap') {dok_1 = '<i class="fa fa-check"></i>'} else {dok_1 = ''}
                    // if (val.dok_2 == 'Lengkap') {dok_2 = '<i class="fa fa-check"></i>'} else {dok_2 = ''}
                    // if (val.dok_3 == 'Lengkap') {dok_3 = '<i class="fa fa-check"></i>'} else {dok_3 = ''}
                    // if (val.dok_4 == 'Lengkap') {dok_4 = '<i class="fa fa-check"></i>'} else {dok_4 = ''}
                    // if (val.dok_5 == 'Lengkap') {dok_5 = '<i class="fa fa-check"></i>'} else {dok_5 = ''}
                    // if (val.dok_6 == 'Lengkap') {dok_6 = '<i class="fa fa-check"></i>'} else {dok_6 = ''}
                    // if (val.dok_7 == 'Lengkap') {dok_7 = '<i class="fa fa-check"></i>'} else {dok_7 = ''}
                    // if (val.dok_8 == 'Lengkap') {dok_8 = '<i class="fa fa-check"></i>'} else {dok_8 = ''}
                    // if (val.dok_9 == 'Lengkap') {dok_9 = '<i class="fa fa-check"></i>'} else {dok_9 = ''}
                    // if (val.dok_10 == 'Lengkap') {dok_10 = '<i class="fa fa-check"></i>'} else {dok_10 = ''}
                    // if (val.dok_11 == 'Lengkap') {dok_11 = '<i class="fa fa-check"></i>'} else {dok_11 = ''}
                    // if (val.dok_12 == 'Lengkap') {dok_12 = '<i class="fa fa-check"></i>'} else {dok_12 = ''}
                    if (val.status_akhir == 'Lulus' ) {statusakhir = 'Lulus'} else {statusakhir = ''}

                    // <td>'+val.id_pelamar+'</td>\
                    newRow.html('\
                        <td>'+val.id_user+'</td>\
                        <td>'+val.id_job_vacancy+'</td>\
                        <td>'+val.no_registrasi+'</td>\
                        <td>'+val.nama+'</td>\
                        <td>'+val.kabupaten+'</td>\
                        <td>'+val.no_hp+'</td>\
                        <td>'+syarat1+'</td>\
                        <td>'+syarat2+'</td>\
                        <td>'+pas_foto+'</td>\
                        <td>'+ktp+'</td>\
                        <td>'+ijazah+'</td>\
                        <td>'+skck+'</td>\
                        <td>'+kk+'</td>\
                        <td>'+dok_1+'</td>\
                        <td>'+dok_2+'</td>\
                        <td>'+dok_3+'</td>\
                        <td>'+dok_4+'</td>\
                        <td>'+dok_5+'</td>\
                        <td>'+dok_6+'</td>\
                        <td>'+dok_7+'</td>\
                        <td>'+dok_8+'</td>\
                        <td>'+dok_9+'</td>\
                        <td>'+dok_10+'</td>\
                        <td>'+dok_11+'</td>\
                        <td>'+dok_12+'</td>\
                        <td>'+statusakhir+'</td>\
                        <td>\
                            <button class="selectEdit waves-effect waves-light btn orange" id="'+val.id_pelamar+'" type="submit" name="btnEdit" data-target="modalPelamar"><i class="material-icons">subtitles</i></button>\
                        </td>\
                    ');

                    data_here.append(newRow);

                });
                $('#dt-pelamar').dataTable({
                  destroy: true //https://stackoverflow.com/questions/24545792/cannot-reinitialise-datatable-dynamic-data-for-datatable
                });
              }
              // END STATUS DATA PADA TABEL
          });
    }

    $('#inputData').submit(function(e){
      // $('#' + 'requirement').html( tinymce.get('requirement').getContent() );
      var formData = new FormData( $("#inputData")[0] );

      e.preventDefault();
         $.ajax({
             url:'<?php echo base_url(); ?>pelamar/insertData',
             type:"post",
             data:formData,
             processData:false,
             contentType:false,
             cache:false,
             async:false,
             success: function(result){
              //  console.log(formData);
              //  window.location.href="<?php echo base_url(); ?>jobvacancies";
           }
         });
      });
  </script>
  </body>
</html>
