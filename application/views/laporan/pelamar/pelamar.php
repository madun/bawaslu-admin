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
        <h4>PELAMAR</h4>
        <form enctype="multipart/form-data" id="inputData" method="post">
          <div class="row">
            <input type="hidden" id="id_pelamar" name="id_pelamar" value="">
            <div class="input-field col l6 m6 s6">
              <input name="username" id="username" type="text" class="validate" >
              <label for="username">Username <span class="red-text">(*)</span></label>
            </div>
            <div class="file-field input-field col l12 m12 s12">
              <div class="btn">
                <span>Syarat 1</span>
                <input type="file" name="syarat1">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" name="image">
              </div>
            </div>
            <div class="file-field input-field col l12 m12 s12">
              <div class="btn">
                <span>Syarat 2</span>
                <input type="file" name="syarat2">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" name="image">
              </div>
            </div>
            <div class="file-field input-field col l12 m12 s12">
              <div class="btn">
                <span>Doc Pendukung</span>
                <input type="file" name="docpendukung">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" name="image">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <!-- <button class="modal-action modal-close waves-effect waves-red btn-flat">CLOSE</button> -->
        <button type="submit" class="simpan modal-action waves-effect waves-green btn-flat">SAVE</button>
        <button onclick="updateData()" class="update modal-action waves-effect waves-green btn-flat" style="display:none;">UPDATE</button>
      </div>
      </form>
    </div>
    <div class="row">
      <div class="col l6">
      <h5>Laporan Pelamar</h5>
      </div>
      <!-- <div class="col l6">
        <button onclick="clearForm();$('.simpan').show();$('.update').hide();" type="button" class="waves-effect waves-light btn right" name="button" data-target="modalPelamar"><i class="material-icons">add</i></button>
      </div> -->
      <div class="col l12">
        <table id="dt-pelamar" class="mdl-data-table" width="100%" cellspacing="0">
          <thead>
                <tr>
                    <th>ID Pelamar</th>
                    <th>Nama Pelamar</th>
                    <th>Syarat 1</th>
                    <th>Syarat 2</th>
                    <th>Syarat Doc. Pendukung</th>
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

          // $.ajax({
          //     type : 'POST',
          //     data : "id_pelamar="+id_pelamar,
          //     url : "<?php echo base_url(); ?>pelamar/getIdPelamar",
          //     success : function(result){
          //         $(".simpan").hide();
          //         $(".update").show();
          //         var resultObj = JSON.parse(result);
          //         // ke dalam object
          //         clearForm();
          //         $.each(resultObj,function(key,val){
          //           // $("[name='id_job_vacancy']").val(val.id_job_vacancy);
          //           // $("[name='judul']").val(val.judul_vacancy).focus();
          //           // $("[name='start']").val(val.tgl_tayang).focus();
          //           // $("[name='expired']").val(val.tgl_expired).focus();
          //           // $("[name='image']").val(val.file_upload);
          //           // tinyMCE.activeEditor.setContent(val.requirement);
          //       });
          //     }
          // });
      });

    });

    function clearForm(){
      $("[name='id_job_vacancy']").val("");
      $("[name='judul']").val("");
      $("[name='start']").val("");
      $("[name='expired']").val("");
      $("[name='upload']").val("");
      // tinyMCE.activeEditor.setContent("");
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

                //fetch data ke dalam object
                $.each(resultObj,function(key,val){
                    var newRow = $("<tr>");
                    var syarat1;
                    var syarat2;
                    if(!val.syarat_administrasi_1 == ''){syarat1 = 'TERPENUHI'}
                    if(!val.syarat_administrasi_2 == ''){syarat2 = 'TERPENUHI'}
                    newRow.html('\
                        <td>'+val.id_pelamar+'</td>\
                        <td>'+val.username+'</td>\
                        <td>'+syarat1+'</td>\
                        <td>'+syarat2+'</td>\
                        <td>'+val.syarat_dok_pendukung+'</td>\
                        <td>'+val.status_akir+'</td>\
                        <td>\
                            <button class="selectEdit waves-effect waves-light btn orange" id="'+val.id_pelamar+'" type="submit" name="btnEdit" data-target="modalJob"><i class="material-icons left">mode_edit</i></button>\
                            <button class="deleteUser waves-effect waves-light btn red" id="'+val.id_pelamar+'" type="submit" name="btnDelete"><i class="material-icons left">delete</i></button>\
                        </td>\
                    ');

                    data_here.append(newRow);

                });
                $('#dt-pelamar').dataTable({
                  destroy: true //https://stackoverflow.com/questions/24545792/cannot-reinitialise-datatable-dynamic-data-for-datatable
                });
              }
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
