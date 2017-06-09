<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>USER</title>
    <style media="screen">
      /*toast*/
      #toast-container {
        top: auto !important;
        right: auto !important;
        bottom: 80%;
        left:40%;
      }

      .detail:hover{
        cursor: pointer;
        color: blue;
      }
    </style>
  </head>
  <body>
    <div id="modalUser" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>User</h4>
          <div class="row">
            <input name="id_user" id="id_user" type="id_user" class="validate" required style="display:none;">
            <div class="input-field col l12 m12 s12">
              <input name="email" id="email" type="email" class="validate" required>
              <label for="email">Email <span class="red-text">(*)</span></label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input name="username" id="nama" type="text" class="validate" required>
              <label for="nama">Nama <span class="red-text">(*)</span></label>
            </div>
            <div id="select" class="input-field col l6 m6 s6">
              <select id="akses" name="akses">
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Admin</option>
                <option value="2">Pelamar</option>
              </select>
              <label for="akses">Akses</label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input name="start" id="start" type="text" class="validate" required>
              <label for="start">Start (yyyy-mm-dd) <span class="red-text">(*)</span></label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input name="expired" id="expired" type="text" class="validate" required>
              <label for="expired">Expired (yyyy-mm-dd) <span class="red-text">(*)</span></label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input name="password" id="password" type="password" class="validate" required>
              <label for="expired">Password <span class="red-text">(*)</span></label>
            </div>
            <!-- <div class="input-field">
              <input type="date" class="datepicker" id="expired" placeholder="Expired">
            </div> -->
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
      <h5>USER</h5>
      </div>
      <div class="col l6">
      <button onclick="clearForm();$('.simpan').show();$('.update').hide();" type="button" class="waves-effect waves-light btn right" name="button" data-target="modalUser"><i class="material-icons">add</i></button>
      </div>

      <div class="col l12">
        <table id="dt-user" class="mdl-data-table" width="100%" cellspacing="0">
          <thead>
                <tr>
                    <th>ID USER</th>
                    <th>E Mail</th>
                    <th>Nama</th>
                    <th>Akses</th>
                    <th>Expired</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                  <th>ID USER</th>
                  <th>E Mail</th>
                  <th>Nama</th>
                  <th>Akses</th>
                  <th>Expired</th>
                  <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody id="load_data">

            </tbody>
        </table>
      </div>
    </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-2.1.1.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      loadData();
      $('.modal').modal({
          dismissible: true, // Modal can be dismissed by clicking outside of the modal
          opacity: .8, // Opacity of modal background
          inDuration: 300, // Transition in duration
          outDuration: 200, // Transition out duration
          startingTop: '4%', // Starting top style attribte
          endingTop: '10%', // Ending top style attribute
          ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
            $('select').material_select();
            $('.datepicker').pickadate({
              selectMonths: true, // Creates a dropdown to control month
              selectYears: 70 // Creates a dropdown of 15 years to control year
            });
          },
          complete: function() {
            $('select').material_select('destroy');
          } // Callback for Modal close
        }
      );

      // get id untuk edit
      $(document).on("click",".selectEdit", function(){
          var id_user = $(this).attr('id');

          $.ajax({
              type : 'POST',
              data : "id_user="+id_user,
              url : "<?php echo base_url(); ?>user/getidUser",
              success : function(result){
                  $(".simpan").hide();
                  $(".update").show();
                  var resultObj = JSON.parse(result);
                  // ke dalam object
                  clearForm();
                  $.each(resultObj,function(key,val){
                    $("[name='id_user']").val(val.id_user);
                    $("[name='username']").val(val.nama).focus();
                    $("[name='akses']").val(val.id_user_type).focus();
                    $("[name='start']").val(val.tgl_insert).focus();
                    $("[name='password']").val(val.password).focus();
                    $("[name='expired']").val(val.tgl_update).focus();
                    $("[name='email']").val(val.email).focus();
                });
              }
          });
      });

      $(document).on("click",".deleteUser", function(){
        if (confirm("Data Akan Terhapus!") == true) {
          var id_user = $(this).attr('id');
          $.ajax({
              type : 'POST',
              data : "id_user="+id_user,
              url : "<?php echo base_url(); ?>user/deleteData",
              success : function(result){
                Materialize.toast('Has Been Deleted!', 1000,'',function(){
                    window.location.href="<?php echo base_url(); ?>user";
                })
              }
          });
        } else {

        }
      });

  } );

  function loadData(){

        var data_here = $('#load_data');
        data_here.html("");
        $.ajax({
            type : 'GET',
            data : '',
            url : '<?php echo base_url(); ?>user/getData',
            success : function(result){
              var resultObj = JSON.parse(result);

              //fetch data ke dalam object
              $.each(resultObj,function(key,val){
                  var newRow = $("<tr>");
                  var btn;
                  if (val.id_user_type == 1) {
                    btn = '';
                  } else {
                    btn = '<button class="deleteUser waves-effect waves-light btn red" id="'+val.id_user+'" type="submit" name="btnDelete"><i class="material-icons left">delete</i></button>';
                  }

                  newRow.html('\
                      <td>'+val.id_user+'</td>\
                      <td><a class="detail" href="<?php echo base_url(); ?>detail_pelamar/getData/'+val.id_user+'">'+val.email+'</a></td>\
                      <td>'+val.nama+'</td>\
                      <td>'+val.user_type+'</td>\
                      <td>'+val.tgl_update+'</td>\
                      <td>\
                          <button class="selectEdit waves-effect waves-light btn orange" id="'+val.id_user+'" type="submit" name="btnEdit" data-target="modalUser"><i class="material-icons left">mode_edit</i></button>\
                          '+btn+'\
                      </td>\
                  ');

                  data_here.append(newRow);

              });
              $('#dt-user').dataTable({
                destroy: true //https://stackoverflow.com/questions/24545792/cannot-reinitialise-datatable-dynamic-data-for-datatable
              });
            }
        });
  }

  function clearForm(){
    $("[name='id_user']").val("");
    $("[name='username']").val("");
    $("[name='akses']").val("");
    $("[name='start']").val("");
    $("[name='expired']").val("");
    $("[name='email']").val("");
    $("[name='password']").val("");
  }

  function insertData(){
    var id_user = $("[name='id_user']").val();
    var user = $("[name='username']").val();
    var akses = $("[name='akses']").val();
    var start = $("[name='start']").val();
    var expired = $("[name='expired']").val();
    var password = $("[name='password']").val();
    var email = $("[name='email']").val();

    $.ajax({
      type : 'POST',
      data : {
        id_user : id_user,
        user : user,
        akses : akses,
        start : start,
        expired : expired,
        password : password,
        email : email
      },
      url : '<?php echo base_url(); ?>user/insertData',
      success : function(result){
        $('.modal').modal('close');
        Materialize.toast('Has Been Added!', 1000,'',function(){
            window.location.href="<?php echo base_url(); ?>user";
        })
        // clear form
        clearForm();
      }
    });
  }

  function updateData(){
    var id_user = $("[name='id_user']").val();
    var user = $("[name='username']").val();
    var akses = $("[name='akses']").val();
    var start = $("[name='start']").val();
    var expired = $("[name='expired']").val();
    var password = $("[name='password']").val();
    var email = $("[name='email']").val();

    $.ajax({
      type : 'POST',
      data : {
        id_user : id_user,
        user : user,
        akses : akses,
        start : start,
        password : password,
        expired : expired,
        email : email
      },
      url : '<?php echo base_url(); ?>user/updateData',
      success : function(result){
        $('.modal').modal('close');
        Materialize.toast('Has Been Edited!', 1000,'',function(){
            window.location.href="<?php echo base_url(); ?>user";
        })
        // clear form
        clearForm();
      }
    });
  }


  </script>
  </body>
</html>
