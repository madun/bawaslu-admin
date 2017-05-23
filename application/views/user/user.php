<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>USER</title>

  </head>
  <body>
    <div id="modalUser" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Add User</h4>
          <div class="row">
            <div class="input-field col l12 m12 s12">
              <input id="email" type="email" class="validate" required>
              <label for="email">Email <span class="red-text">(*)</span></label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input id="nama" type="text" class="validate" required>
              <label for="nama">Nama <span class="red-text">(*)</span></label>
            </div>
            <div id="select" class="input-field col l6 m6 s6">
              <select id="akses">
                <option value="" disabled selected>Choose your option</option>
                <option value="1">Admin</option>
                <option value="2">Pelamar</option>
              </select>
              <label for="akses">Akses</label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input id="start" type="text" class="validate" required>
              <label for="start">Start (dd-mm-yyyy) <span class="red-text">(*)</span></label>
            </div>
            <div class="input-field col l6 m6 s6">
              <input id="expired" type="text" class="validate" required>
              <label for="expired">Expired (dd-mm-yyyy) <span class="red-text">(*)</span></label>
            </div>
            <!-- <div class="input-field">
              <input type="date" class="datepicker" id="expired" placeholder="Expired">
            </div> -->
          </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">CLOSE</a>
            <a href="#!" class="simpan modal-action waves-effect waves-green btn-flat">SAVE</a>
            <a href="#!" class="update modal-action waves-effect waves-green btn-flat" style="display:none;">UPDATE</a>
        </div>
    </div>
    <div class="row">
      <div class="col l6">
      <h5>USER</h5>
      </div>
      <div class="col l6">
      <button type="button" class="waves-effect waves-light btn right" name="button" data-target="modalUser"><i class="material-icons">add</i></button>
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
      var oTable1 = $('#dt-user').dataTable({
        // "processing": true,
        // "serverSide": true,
          "aoColumns" : [
            null,null,null,null,null
            // { "bSortable": false }
          ]
      });
      $('#modalUser').modal({
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
                  $.each(resultObj,function(key,val){
                    $("[name='id_barang']").val(val.id_barang);
                    $("[name='nama_barang']").val(val.nama_barang);
                    $("[name='jumlah_barang']").val(val.jumlah_barang);
                    $("[name='harga']").val(val.harga);
                    $("[name='status']").val(val.quality);
                    $("[name='keterangan']").val(val.keterangan);
                });
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
            url : '<?php echo base_url(); ?>user/getData',
            success : function(result){
              var resultObj = JSON.parse(result);

              //fetch data ke dalam object
              $.each(resultObj,function(key,val){
                  var newRow = $("<tr>");

                  newRow.html('\
                      <td>'+val.id_user+'</td>\
                      <td>'+val.email+'</td>\
                      <td>'+val.username+'</td>\
                      <td>'+val.user_type+'</td>\
                      <td>'+val.tgl_update+'</td>\
                      <td>\
                          <button class="selectEdit waves-effect waves-light btn orange" id="" type="submit" name="btnEdit" data-target="modalUser"><i class="material-icons left">mode_edit</i></button>\
                          <button class="waves-effect waves-light btn red" id="" type="submit" name="btnDelete" data-target="modalUser"><i class="material-icons left">delete</i></button>\
                      </td>\
                  ');

                  data_here.append(newRow);
              });
            }
        });
    }
  </script>
  </body>
</html>
