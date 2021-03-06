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
      <form enctype="multipart/form-data" id="inputData" method="post">
      <div class="modal-content">
        <h4>JOB VACANCIES</h4>
          <div class="row">
            <input type="hidden" id="id_job_vacancy" name="id_job_vacancy" value="">
            <!-- <div class="input-field col l6 m6 s6">
            </div> -->
            <div class="input-field col l6 m6 s6">
              <input name="start" id="start" type="text" class="validate" required>
              <label for="start">Start (yyyy-mm-dd) <span class="red-text">(*)</span></label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input name="expired" id="expired" type="text" class="validate" required>
              <label for="expired">Expired (yyyy-mm-dd) <span class="red-text">(*)</span></label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input name="city" id="city" type="text" class="autocomplete" required>
              <label for="city-input">Kabupaten <span class="red-text">(*)</span></label>
              <!-- <select id="city" class="city form-control" style="width:100%" name="city"></select> -->
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
                <input class="file-path validate" type="text" name="image">
              </div>
            </div>
            <div class="col l12 m12 s12">
              <textarea id="requirement" name="requirement" placeholder=""></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button class="modal-action modal-close waves-effect waves-red btn-flat">CLOSE</button>
        <button onclick="insertData()" class="simpan modal-action waves-effect waves-green btn-flat">SAVE</button><!-- type="submit" -->
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
                    <th>Kab.</th>
                    <th>Tgl Tayang</th>
                    <th>Tgl Expired</th>
                    <th>Judul VACANCIES</th>
                    <!-- <th>Requirement</th> -->
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

            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(); ?>jobvacancies/getDataKab',
                success: function(response) {
                  var countryArray = JSON.parse(response);
                  var dataCountry = {};
                  for (var i = 0; i < countryArray.length; i++) {
                    //console.log(countryArray[i].name);
                    dataCountry[countryArray[i].name] = countryArray[i].kabid; //countryArray[i].flag or null
                  }
                  console.log(dataCountry);
                  $('#city.autocomplete').autocomplete({
                    data: dataCountry,
                    limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
                  });
                }
              });

          },
          complete: function() {
            // $('select').material_select('destroy');
          } // Callback for Modal close
        }
      );

      // get id untuk edit
      $(document).on("click",".selectEdit", function(){
          var id_job_vacancy = $(this).attr('id');

          $.ajax({
              type : 'POST',
              data : "id_job_vacancy="+id_job_vacancy,
              url : "<?php echo base_url(); ?>jobvacancies/getIdJobvacancies",
              success : function(result){
                  $(".simpan").hide();
                  $(".update").show();
                  var resultObj = JSON.parse(result);
                  // ke dalam object
                  clearForm();
                  $.each(resultObj,function(key,val){
                    $("[name='id_job_vacancy']").val(val.id_job_vacancy);
                    $("[name='judul']").val(val.judul_vacancy).focus();
                    $("[name='start']").val(val.tgl_tayang).focus();
                    $("[name='expired']").val(val.tgl_expired).focus();
                    $("[name='image']").val(val.file_upload);
                    tinyMCE.activeEditor.setContent(val.requirement);
                });
              }
          });
      });

      $(document).on("click",".deleteUser", function(){
        if (confirm("Data Akan Terhapus!") == true) {
          var id_job_vacancy = $(this).attr('id');
          $.ajax({
              type : 'POST',
              data : "id_job_vacancy="+id_job_vacancy,
              url : "<?php echo base_url(); ?>jobvacancies/deleteData",
              success : function(result){
                Materialize.toast('Has Been Deleted!', 1000,'',function(){
                    window.location.href="<?php echo base_url(); ?>jobvacancies";
                })
              }
          });
        } else {
            // txt = "You pressed Cancel!";
        }
      });

  } );

  function clearForm(){
    $("[name='id_job_vacancy']").val("");
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
                      <td>'+val.kabupaten+'</td>\
                      <td>'+val.tgl_tayang+'</td>\
                      <td>'+val.tgl_expired+'</td>\
                      <td>'+val.judul_vacancy+'</td>\
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
    // console.log($('#city').val());

    $('#' + 'requirement').html( tinymce.get('requirement').getContent() );
    var formData = new FormData( $("#inputData")[0] );

    e.preventDefault();
       $.ajax({
           url:'<?php echo base_url(); ?>jobvacancies/insertData',
           type:"post",
           data:formData,
           processData:false,
           contentType:false,
           cache:false,
           async:false,
         //   success: function(result){
         //     window.location.href="<?php echo base_url(); ?>jobvacancies";
         // } 
         success : function(result){
        $('.modal').modal('close');
        Materialize.toast('Has Been Added!', 1000,'',function(){
            window.location.href="<?php echo base_url(); ?>jobvacancies";
        })
        // clear form
        clearForm();
      }
       });
  });

  // function insertData(){
  //   var start = $("[name='start']").val();
  //   var expired = $("[name='expired']").val();
  //   var city = $("[name='city']").val();
  //   var judul = $("[name='judul']").val();
  //   var file = $("[name='file']").val();
  //   var requirement = tinymce.get('requirement').getContent();

  //   $.ajax({
  //     type : 'POST',
  //     data : {
  //       start : start,
  //       expired : expired,
  //       city : city,
  //       judul : judul,
  //       file : file,
  //       requirement : requirement
  //     },
  //     url : '<?php echo base_url(); ?>jobvacancies/insertData',
  //     success : function(result){
  //       $('.modal').modal('close');
  //       Materialize.toast('Has Been Added!', 1000,'',function(){
  //           window.location.href="<?php echo base_url(); ?>jobvacancies";
  //       })
  //       // clear form
  //       clearForm();
  //     }
  //   });
  // }

  // function updateData(){
  //   var start = $("[name='start']").val();
  //   var expired = $("[name='expired']").val();
  //   var city = $("[name='city']").val();
  //   var judul = $("[name='judul']").val();
  //   var file = $("[name='file']").val();
  //   var requirement = tinymce.get('requirement').getContent();

  //   $.ajax({
  //     type : 'POST',
  //     data : {
  //       start : start,
  //       expired : expired,
  //       city : city,
  //       judul : judul,
  //       file : file,
  //       requirement : requirement
  //     },
  //     url : '<?php echo base_url(); ?>jobvacancies/updateData',
  //     success : function(result){
  //       $('.modal').modal('close');
  //       Materialize.toast('Has Been Edited!', 1000,'',function(){
  //           window.location.href="<?php echo base_url(); ?>jobvacancies";
  //       })
  //       // clear form
  //       clearForm();
  //     }
  //   });
  // }
    function updateData(){
      $('#' + 'requirement').html( tinymce.get('requirement').getContent() );
      var formData = new FormData( $("#inputData")[0] );
    
      e.preventDefault();
         $.ajax({
             url:'<?php echo base_url(); ?>jobvacancies/updateData',
             type:"post",
             data:formData,
             processData:false,
             contentType:false,
             cache:false,
             async:false,
             success: function(result){
               window.location.href="<?php echo base_url(); ?>jobvacancies";
              console.log(result);

              // clear form
        clearForm();
           }
         });
    }
  </script>
  </body>
</html>
