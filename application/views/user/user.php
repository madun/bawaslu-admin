<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>USER</title>

  </head>
  <body>
    <div id="addUser" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <div class="col l12 m12 s12">
                here im : <input type="text" name="" value="">
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">CLOSE</a>
            <a href="#!" class="modal-action waves-effect waves-green btn-flat">Agree</a>
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
      $('.modal').modal();
  } );
  </script>
  </body>
</html>
