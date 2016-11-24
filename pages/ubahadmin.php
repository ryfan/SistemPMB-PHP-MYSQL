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
        <title>Ubah Admin - Master Data</title>
        <link rel="stylesheet" href="../materialize/css/materialize.css">
        <link rel="stylesheet" href="../materialize/css/custom.css">
        <link href="../materialicon/icon.css" rel="stylesheet">
        <link rel="stylesheet" href="../fontawesome/font-awesome.min.css">
        <script src="../jquery/jquery-1.12.2.js" charset="utf-8"></script>
        <script src="../materialize/js/materialize.js" charset="utf-8"></script>
      </head>
      <body>
        <div class="navbar-fixed">
            <nav class="indigo darken-4">
              <div class="nav-wrapper container">
                <a href="#!" class="brand-logo">Sistem PMB</a>
                <ul class="right hide-on-med-and-down">
                  <li><a href="calonmahasiswa.php">Master Admin</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="row">
          <div class="section" id="index-banner">
          <div class="container col s6 offset-s3 card-panel z-depth-3">
                <form action="updateadmin.php" method="post" style="margin-top:5%;">
                <h5><center>Ubah Data Admin</center></h5>
                <?php
                  // terima id dari halaman user.php
                  $id = $_GET['Id'];
                  $query = mysql_query("select * from users where Id='$id'");
                  $data = mysql_fetch_array($query);
                  ?>
                <div class="input-field col s12">
                    <i class="material-icons prefix">bookmark</i>
                    <input id="icon_prefix" type="text" class="validate" name="id" value="<?php echo $data['Id']; ?>" readonly>
                    <label for="icon_prefix">ID</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">stars</i>
                    <input id="icon_prefix" type="text" class="validate" name="username" required value="<?php echo $data['username']; ?>" readonly>
                    <label for="icon_prefix">Username</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="icon_prefix" type="password" class="validate" name="password" required value="<?php echo $data['password']; ?>">
                    <label for="icon_prefix">Password</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" name="nama" required value="<?php echo $data['nama']; ?>">
                    <label for="icon_prefix">Nama</label>
                </div>
                  <div class="center col s12"><br>
                  <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="Update">Update Data<i class="material-icons right">send</i></button>
                <br><br></div>
            </form>
          </div>
        </div>
        </div>
        <center><span>Copyright 2016 Sistem Penerimaan Mahasiswa Baru</span></center>
  </body>
</html>
