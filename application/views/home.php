<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="assets/datatables/dataTables.bootstrap.min.css" rel="stylesheet"> -->
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>Example page header <small>Subtext for header</small></h1>
      </div>
      <div class="messages"></div>
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" onclick="addPosisi()">Add Data</button>
      <br>
      <br>
      <table class="table table-bordered table-condensed" id="managePosisiTable">
        <thead>
          <tr>
            <th><small>Nama Posisi</small></th>
          </tr>
        </thead>
      </table>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <form method="post" action="index.php/welcome/create" id="createForm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama_posisi">Nama Posisi</label>
                <input type="text" class="form-control" name="nama_posisi" id="nama_posisi" placeholder="Nama Posisi">
              </div>             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    
    <script src="assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/datatables/jquery.dataTables.min.js"></script>
    <script src="custom/home.js"></script>
  </body>
</html>