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
    <div id="modalJob" class="modal">
      <div class="modal-content">
        <h4>JOB VACANCIES</h4>
        <form enctype="multipart/form-data" id="inputData" method="post">
          <div class="row">
            <input type="hidden" name="id_job_vacancy" value="">
            <div class="input-field col l6 m6 s6">
              <input name="start" id="start" type="text" class="validate" required>
              <label for="start">Start (yyyy-mm-dd) <span class="red-text">(*)</span></label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input name="expired" id="expired" type="text" class="validate" required>
              <label for="expired">Expired (yyyy-mm-dd) <span class="red-text">(*)</span></label>
            </div>
            <div class="input-field col l12 m12 s12">
              <input name="judul" id="judul" type="text" class="validate" required>
              <label for="judul">Judul <span class="red-text">(*)</span></label>
            </div>
            <div class="file-field input-field col l12 m12 s12">
              <div class="btn">
                <span>Upload Cover</span>
                <input type="file" name="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
            <div class="col l12 m12 s12">
              <textarea id="requirement" name="requirement" placeholder=""></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button class="modal-action modal-close waves-effect waves-red btn-flat">CLOSE</button>
        <button type="submit" class="simpan modal-action waves-effect waves-green btn-flat">SAVE</button>
        <button onclick="updateData()" class="update modal-action waves-effect waves-green btn-flat" style="display:none;">UPDATE</button>
      </div>
      </form>
    </div>
    <div class="row">
      <div class="col l6">
      <h5>JOB VACANCIES</h5>
      </div>
      <div class="col l6">
        <button onclick="clearForm();$('.simpan').show();$('.update').hide();" type="button" class="waves-effect waves-light btn right" name="button" data-target="modalJob"><i class="material-icons">add</i></button>
      </div>

      <div class="col l12">
        <table id="dt-job" class="mdl-data-table" width="100%" cellspacing="0">
          <thead>
                <tr>
                    <th>ID VACANCIES</th>
                    <th>Tgl Tayang</th>
                    <th>Tgl Expired</th>
                    <th>Judul VACANCIES</th>
                    <th>Requirement</th>
                    <th>File Upload</th>
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
  } );

  function clearForm(){
    $("[name='judul']").val("");
    $("[name='start']").val("");
    $("[name='expired']").val("");
    $("[name='upload']").val("");
    tinyMCE.activeEditor.setContent("");
  }

  function loadData(){

        var data_here = $('#load_data');
        data_here.html("");
        $.ajax({
            type : 'GET',
            data : '',
            url : '<?php echo base_url(); ?>jobvacancies/getData',
            success : function(result){
              var resultObj = JSON.parse(result);

              //fetch data ke dalam object
              $.each(resultObj,function(key,val){
                  var newRow = $("<tr>");

                  newRow.html('\
                      <td>'+val.id_job_vacancy+'</td>\
                      <td>'+val.tgl_tayang+'</td>\
                      <td>'+val.tgl_expired+'</td>\
                      <td>'+val.judul_vacancy+'</td>\
                      <td>'+val.requirement+'</td>\
                      <td>'+val.file_upload+'</td>\
                      <td>\
                          <button class="selectEdit waves-effect waves-light btn orange" id="'+val.id_job_vacancy+'" type="submit" name="btnEdit" data-target="modalJob"><i class="material-icons left">mode_edit</i></button>\
                          <button class="deleteUser waves-effect waves-light btn red" id="'+val.id_job_vacancy+'" type="submit" name="btnDelete"><i class="material-icons left">delete</i></button>\
                      </td>\
                  ');

                  data_here.append(newRow);

              });
              $('#dt-job').dataTable({
                destroy: true //https://stackoverflow.com/questions/24545792/cannot-reinitialise-datatable-dynamic-data-for-datatable
              });
            }
        });
  }

  $('#inputData').submit(function(e){
    $('#' + 'requirement').html( tinymce.get('requirement').getContent() );
    var formData = new FormData( $("#inputData")[0] );
    // var dataObj = JSON.parse(formData);
    // console.log(formData);
    // return;

    e.preventDefault();
       $.ajax({
           url:'<?php echo base_url(); ?>jobvacancies/insertData',
           type:"post",
           data:formData,
           processData:false,
           contentType:false,
           cache:false,
           async:false,
           success: function(result){
             var resultObj = JSON.parse(result);
             console.log(resultObj);
            //  $.each(resultObj,function(key,val){
            //    alert();
            //  });
         }
       });
    });
  </script>
  </body>
</html>
