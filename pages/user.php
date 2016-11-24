<?php
session_start();
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Calon Mahasiwa - Master Data</title>
        <link rel="stylesheet" href="../materialize/css/materialize.css" type="text/css" />
        <link href="../materialicon/icon.css" rel="stylesheet">
        <link rel="stylesheet" href="../fontawesome/font-awesome.min.css">
        <link rel="stylesheet" href="../datatables/jquery.dataTables.min.css" type="text/css" />
        <script src="../jquery/jquery-1.12.2.js"></script>
        <script src="../datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
        $('#user').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true });
        });
        </script>
        <style>
        th {
          text-align: center;
        }
        .foot {
          position:fixed;
          left:0px;
          bottom:0px;
          height:5px;
          width:100%;
        }
      </style>
      </head>
      <body>
        <div class="navbar-fixed">
            <nav class="indigo darken-4">
              <div class="nav-wrapper container">
                <a href="#!" class="brand-logo">Sistem PMB</a>
                <ul class="right hide-on-med-and-down">
                  <li class="active"><a href="calonmahasiswa.php">Master Admin</a></li>
                  <li><a href="tambahuser.php" class="waves-effect waves-light btn indigo darken-3 lighten-1" >Tambah Admin</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <br>
          <div class="container">
            <table  class="striped z-depth-3 display indigo darken-4" id="user" cellspacing="0" width="100%">
          		<thead>
          			<tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama</th>
                  <th>Aksi</th>
          			</tr>
          		</thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
          		<tbody>
                <?php
          			$query = mysql_query("select * from users");
          			while ($data = mysql_fetch_array($query)) {
          			?>
                <tr>
          				<td style="text-align:center;"><?php echo $data['Id']; ?></td>
          				<td style="text-align:center;"><?php echo $data['username']; ?></td>
          				<td style="text-align:center;">******</td>
                  <td style="text-align:center;"><?php echo $data['nama']; ?></td>
                  <td style="text-align:center;"><a href="ubahadmin.php?Id=<?php echo $data['Id'];?>">Ubah</a>
                   | <a href="hapusadmin.php?Id=<?php echo $data['Id'];?>" class="red-text">Hapus</a></td>
          			</tr>
          			<?php } ?>
          		</tbody>
          	</table>
            <br><br>
          </div>
          <div class="row center foot"> Copyright 2016 - Sistem Penerimaan Mahasiswa Baru STMIK DHARMA PUTRA</div>
      <script src="../materialize/js/materialize.js"></script>
  </body>
</html>
