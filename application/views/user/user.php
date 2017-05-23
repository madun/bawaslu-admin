<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>USER</title>

  </head>
  <body>
    <div id="addUser" class="modal modal-fixed-footer">
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
            <div class="input-field">
              <input type="date" class="datepicker" id="expired" placeholder="Expired">
              <!-- <label for="birth">Birth <span class="red-text">(*)</span></label> -->
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">CLOSE</a>
            <a href="#!" class="modal-action waves-effect waves-green btn-flat">SAVE</a>
        </div>
    </div>
    <div class="row">
      <div class="col l6">
      <h5>USER</h5>
      </div>
      <div class="col l6">
      <button type="button" class="waves-effect waves-light btn right" name="button" data-target="addUser"><i class="material-icons">add</i></button>
      </div>

      <div class="col l12">
        <table id="example" class="mdl-data-table" width="100%" cellspacing="0">
          <thead>
                <tr>
                    <th>No</th>
                    <th>ID USER</th>
                    <th>E Mail</th>
                    <th>Nama</th>
                    <th>Akses</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                  <td>Who is This</td>
                  <td>test job</td>
                  <td>fdasf</td>
                  <td>22</td>
                  <td>20-12-2017</td>
                  <td>
                      <button class="waves-effect waves-light btn orange" id="btnEdit" type="submit" name="btnEdit"><i class="material-icons left">mode_edit</i></button>
                      <button class="waves-effect waves-light btn red" id="btnDelete" type="submit" name="btnDelete"><i class="material-icons left">delete</i></button>
                  </td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-2.1.1.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('#example').dataTable();
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
      
  } );
  </script>
  </body>
</html>
