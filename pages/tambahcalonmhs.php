<?php
session_start();
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}

function autoNumber($id, $table){
  $query = 'SELECT MAX(RIGHT('.$id.', 4)) as max_id FROM '.$table.' ORDER BY '.$id;
  $result = mysql_query($query);
  $data = mysql_fetch_array($result);
  $id_max = $data['max_id'];
  $sort_num = (int) substr($id_max, 1, 4);
  $sort_num++;
  $new_code = sprintf("%04s", $sort_num);
  return $new_code;
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
                <form action="insertcalonmhs.php" method="post" style="margin-top:5%;">
                <h5><center>Tambah Data Calon Mahasiswa</center></h5>
                <div class="input-field col s12">
                    <i class="material-icons prefix">bookmark</i>
                    <input id="icon_prefix" type="text" class="validate" name="id_cln" value="<?php echo autoNumber('id_cln','calon_mhs');?>" readonly>
                    <label for="icon_prefix">ID Calon Mhs</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" name="nama" required length="50">
                    <label for="icon_prefix">Nama</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">location_on</i>
                    <textarea id="textarea1" class="materialize-textarea" name="alamat" required length="255"></textarea>
                    <label for="icon_prefix">Alamat</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">call</i>
                    <input id="icon_prefix" type="number" class="validate" name="notelp" required length="12">
                    <label for="icon_prefix">No Telp</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">import_contacts</i>
                    <input id="icon_prefix" type="text" class="validate" name="no_ijasah" required length="16">
                    <label for="icon_prefix">No Ijasah</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">stars</i>
                    <input id="icon_prefix" type="text" class="validate" name="nem" required>
                    <label for="icon_prefix">NEM</label>
                </div>
                  <div class="center col s6"><br>
                  <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="Tambah">Tambah Data<i class="material-icons right">send</i></button>
                </div>
            </form>
          </div>
        </div>
        </div>
        <center><span>Copyright 2016 Sistem Penerimaan Mahasiswa Baru</span></center>
  </body>
</html>
