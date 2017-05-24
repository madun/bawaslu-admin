<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PENGUMUMAN</title>
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
          <div class="input-field col l6 m6 s6">
            <input name="judul" id="judul" type="text" class="validate" required>
            <label for="judul">Judul <span class="red-text">(*)</span></label>
          </div>
          <div id="select" class="input-field col l6 m6 s6">
            <select id="kategori" name="kategori">
              <option value="" disabled selected>Choose your option</option>
              <option value="1">Admin</option>
              <option value="2">Pelamar</option>
            </select>
            <label for="kategori">Kategori</label>
          </div>
          <div class="input-field col l6 m6 s6">
            <input name="start" id="start" type="text" class="validate" required>
            <label for="start">Start (dd-mm-yyyy) <span class="red-text">(*)</span></label>
          </div>
          <div class="input-field col l6 m6 s6">
            <input name="expired" id="expired" type="text" class="validate" required>
            <label for="expired">Expired (dd-mm-yyyy) <span class="red-text">(*)</span></label>
          </div>
          <div class="col l12 m12 s12">
            <textarea name="isi" placeholder="Isi Pengumuman"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
      </div>
    </div>
    <div class="row">
      <div class="col l6">
      <h5>PENGUMUMAN</h5>
      </div>
      <div class="col l6">
      <button type="button" class="waves-effect waves-light btn right" name="button" data-target="modalPengumuman"><i class="material-icons">add</i></button>
      </div>

      <div class="col l12">
        <table id="dt-pengumuman" class="mdl-data-table" width="100%" cellspacing="0">
          <thead>
                <tr>
                    <th>ID Pengumuman</th>
                    <th>Tgl Tayang</th>
                    <th>Tgl Expired</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Isi</th>
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
      $('#dt-pengumuman').dataTable();
      $('.modal').modal({
          dismissible: true, // Modal can be dismissed by clicking outside of the modal
          opacity: .8, // Opacity of modal background
          inDuration: 300, // Transition in duration
          outDuration: 200, // Transition out duration
          startingTop: '4%', // Starting top style attribte
          endingTop: '10%', // Ending top style attribute
          ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
            $('select').material_select();
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
  </script>
  </body>
</html>
