<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PENGUMUMAN</title>
    <style media="screen">
      /*toast*/
      #toast-container {
        top: auto !important;
        right: auto !important;
        bottom: 80%;
        left:40%;
      }
    </style>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/js/tinymce.min.js"></script>
    <script>
      tinymce.init({
          selector:'textarea',
          branding: false,
          height : 400
      });
    </script>
  </head>
  <body>
    <!-- Modal Structure -->
    <div id="modalPengumuman" class="modal">
      <div class="modal-content">
        <h4>Pengumuman</h4>
        <div class="row">
          <input type="hidden" name="id_pengumuman" value="">
          <div class="input-field col l12 m12 s12">
            <input name="judul" id="judul" type="text" class="validate" required>
            <label for="judul">Judul <span class="red-text">(*)</span></label>
          </div>
          <!-- <div id="select" class="input-field col l6 m6 s6">
            <select id="kategori" name="kategori">
              <option value="" disabled selected>Choose your option</option>
              <option value="1">Admin</option>
              <option value="2">Pelamar</option>
            </select>
            <label for="kategori">Kategori</label>
          </div> -->
          <div class="input-field col l6 m6 s6">
            <input name="start" id="start" type="text" class="validate" required>
            <label for="start">Start (yyyy-mm-dd) <span class="red-text">(*)</span></label>
          </div>
          <div class="input-field col l6 m6 s6">
            <input name="expired" id="expired" type="text" class="validate" required>
            <label for="expired">Expired (yyyy-mm-dd) <span class="red-text">(*)</span></label>
          </div>
          <div class="col l12 m12 s12">
            <textarea id="isi" placeholder="Isi Pengumuman"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="modal-action modal-close waves-effect waves-red btn-flat">CLOSE</button>
        <button onclick="insertData()" class="simpan modal-action waves-effect waves-green btn-flat">SAVE</button>
        <button onclick="updateData()" class="update modal-action waves-effect waves-green btn-flat" style="display:none;">UPDATE</button>
      </div>
    </div>
    <div class="row">
      <div class="col l6">
      <h5>PENGUMUMAN</h5>
      </div>
      <div class="col l6">
        <button onclick="clearForm();$('.simpan').show();$('.update').hide();" type="button" class="waves-effect waves-light btn right" name="button" data-target="modalPengumuman"><i class="material-icons">add</i></button>
      </div>

      <div class="col l12">
        <table id="dt-pengumuman" class="mdl-data-table" width="100%" cellspacing="0">
          <thead>
                <tr>
                    <th>ID Pengumuman</th>
                    <th>Tgl Tayang</th>
                    <th>Tgl Expired</th>
                    <th>Judul</th>
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
  $(document).ready(function() {
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
            // $('select').material_select();
            // $('.datepicker').pickadate({
            //   selectMonths: true, // Creates a dropdown to control month
            //   selectYears: 70 // Creates a dropdown of 15 years to control year
            // });
          },
          complete: function() {
            // $('select').material_select('destroy');
          } // Callback for Modal close
        }
      );

      // get id untuk edit
      $(document).on("click",".selectEdit", function(){
          var id_pengumuman = $(this).attr('id');

          $.ajax({
              type : 'POST',
              data : "id_pengumuman="+id_pengumuman,
              url : "<?php echo base_url(); ?>pengumuman/getIdPengumuman",
              success : function(result){
                  $(".simpan").hide();
                  $(".update").show();
                  var resultObj = JSON.parse(result);
                  // ke dalam object
                  clearForm();
                  $.each(resultObj,function(key,val){
                    $("[name='id_pengumuman']").val(val.id_pengumuman);
                    $("[name='judul']").val(val.judul_pengumuman).focus();
                    $("[name='start']").val(val.tgl_tayang).focus();
                    $("[name='expired']").val(val.tgl_expired).focus();
                    tinyMCE.activeEditor.setContent(val.isi_pengumuman);
                });
              }
          });
      });

      $(document).on("click",".deleteUser", function(){
        var id_pengumuman = $(this).attr('id');
        $.ajax({
            type : 'POST',
            data : "id_pengumuman="+id_pengumuman,
            url : "<?php echo base_url(); ?>pengumuman/deleteData",
            success : function(result){
              Materialize.toast('Has Been Deleted!', 1000,'',function(){
                  window.location.href="<?php echo base_url(); ?>pengumuman";
              })
            }
        });
      });

  } );

  function loadData(){

        var data_here = $('#load_data');
        data_here.html("");
        $.ajax({
            type : 'GET',
            data : '',
            url : '<?php echo base_url(); ?>pengumuman/getData',
            success : function(result){
              var resultObj = JSON.parse(result);

              //fetch data ke dalam object
              $.each(resultObj,function(key,val){
                  var newRow = $("<tr>");
                  var btn;
                  if (val.id_user_type == 1) {
                    btn = '';
                  } else {
                    btn = '';
                  }

                  newRow.html('\
                      <td>'+val.id_pengumuman+'</td>\
                      <td>'+val.tgl_tayang+'</td>\
                      <td>'+val.tgl_expired+'</td>\
                      <td>'+val.judul_pengumuman+'</td>\
                      <td>\
                          <button class="selectEdit waves-effect waves-light btn orange" id="'+val.id_pengumuman+'" type="submit" name="btnEdit" data-target="modalPengumuman"><i class="material-icons left">mode_edit</i></button>\
                          <button class="deleteUser waves-effect waves-light btn red" id="'+val.id_pengumuman+'" type="submit" name="btnDelete"><i class="material-icons left">delete</i></button>\
                      </td>\
                  ');

                  data_here.append(newRow);

              });
              $('#dt-pengumuman').dataTable({
                destroy: true //https://stackoverflow.com/questions/24545792/cannot-reinitialise-datatable-dynamic-data-for-datatable
              });
            }
        });
  }


  function clearForm(){
    $("[name='judul']").val("");
    $("[name='start']").val("");
    $("[name='expired']").val("");
    tinyMCE.activeEditor.setContent("");
  }

  function insertData(){
    var judul = $("[name='judul']").val();
    var start = $("[name='start']").val();
    var expired = $("[name='expired']").val();
    var isi = tinymce.get('isi').getContent();

    $.ajax({
      type : 'POST',
      data : {
        judul : judul,
        start : start,
        expired : expired,
        isi : isi
      },
      url : '<?php echo base_url(); ?>pengumuman/insertData',
      success : function(result){
        $('.modal').modal('close');
        Materialize.toast('Has Been Added!', 1000,'',function(){
            window.location.href="<?php echo base_url(); ?>pengumuman";
        })
        // clear form
        clearForm();
      }
    });
  }

  function updateData(){
    var id_pengumuman = $("[name='id_pengumuman']").val();
    var judul = $("[name='judul']").val();
    var start = $("[name='start']").val();
    var expired = $("[name='expired']").val();
    var isi = tinymce.get('isi').getContent();

    $.ajax({
      type : 'POST',
      data : {
        id_pengumuman : id_pengumuman,
        judul : judul,
        start : start,
        expired : expired,
        isi : isi
      },
      url : '<?php echo base_url(); ?>pengumuman/updateData',
      success : function(result){
        $('.modal').modal('close');
        Materialize.toast('Has Been Edited!', 1000,'',function(){
            window.location.href="<?php echo base_url(); ?>pengumuman";
        })
        // clear form
        clearForm();
      }
    });
  }
  </script>
  </body>
</html>
