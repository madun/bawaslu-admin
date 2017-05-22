<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>USER</title>

  </head>
  <body>
    <div class="row">
      <div class="col l6">
      <h5>USER</h5>
      </div>
      <div class="col l6">
      <button type="button" class="waves-effect waves-light btn right" name="button"><i class="material-icons">add</i></button>
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
  } );
  </script>
  </body>
</html>
