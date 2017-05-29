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
    <div id="modalPelamar" class="modal">
      <div class="modal-content">
        <h4>JOB VACANCIES</h4>
        <form enctype="multipart/form-data" id="inputData" method="post">
          <div class="row">
            <input type="hidden" id="id_job_vacancy" name="id_job_vacancy" value="">
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
        <button type="submit" class="simpan modal-action waves-effect waves-green btn-flat">SAVE</button>
        <button onclick="updateData()" class="update modal-action waves-effect waves-green btn-flat" style="display:none;">UPDATE</button>
      </div>
      </form>
    </div>
    <div class="row">
      <div class="col l6">
      <h5>Laporan Pelamar</h5>
      </div>
      <div class="col l6">
        <button onclick="clearForm();$('.simpan').show();$('.update').hide();" type="button" class="waves-effect waves-light btn right" name="button" data-target="modalPelamar"><i class="material-icons">add</i></button>
      </div>

      <div class="col l12">
        <table id="dt-job" class="mdl-data-table" width="100%" cellspacing="0">
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

  </body>
</html>
