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
        <title>Tambah Calon Mahasiwa - Master Data</title>
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
                  <li><a href="calonmahasiswa.php">Master Calon Mahasiswa</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="row">
          <div class="section" id="index-banner">
          <div class="container col s6 offset-s3 card-panel z-depth-3">
                <form action="updatecalonmhs.php" method="post" style="margin-top:5%;">
                <h5><center>Ubah Data Calon Mahasiswa</center></h5>
                <?php
                  // terima id_cln dari halaman calonmahasiswa.php
                  $id_cln = $_GET['id_cln'];
                  $query = mysql_query("select * from calon_mhs where id_cln='$id_cln'");
                  $data = mysql_fetch_array($query);
                  ?>
                <div class="input-field col s12">
                    <i class="material-icons prefix">bookmark</i>
                    <input id="icon_prefix" type="text" class="validate" name="id_cln" value="<?php echo $data['id_cln']; ?>" disabled>
                    <label for="icon_prefix">ID Calon Mhs</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" name="nama" required length="50" value="<?php echo $data['nama']; ?>">
                    <label for="icon_prefix">Nama</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_on</i>
                    <textarea id="textarea1" class="materialize-textarea" name="alamat" required length="255"><?php echo $data['alamat']; ?></textarea>
                    <label for="icon_prefix">Alamat</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">call</i>
                    <input id="icon_prefix" type="number" class="validate" name="notelp" required length="12" value="<?php echo $data['notelp']; ?>">
                    <label for="icon_prefix">No Telp</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">import_contacts</i>
                    <input id="icon_prefix" type="text" class="validate" name="no_ijasah" required length="16" value="<?php echo $data['no_ijasah']; ?>">
                    <label for="icon_prefix">No Ijasah</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">stars</i>
                    <input id="icon_prefix" type="text" class="validate" name="nem" required value="<?php echo $data['nem']; ?>">
                    <label for="icon_prefix">NEM</label>
                </div>
                  <div class="center col s6"><br>
                  <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="ubahData">Ubah Data<i class="material-icons right">send</i></button>
                </div>
                <input type="hidden" name="id_cln" value="<?php echo $data['id_cln']; ?>" />
            </form>
          </div>
        </div>
        </div>
        <center><span>Copyright 2016 Sistem Penerimaan Mahasiswa Baru</span></center>
  </body>
</html>
