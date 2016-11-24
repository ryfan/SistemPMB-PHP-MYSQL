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
        <title>Ubah Formulir - Sistem Penerimaan Mahasiswa Baru</title>
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
                  <li><a href="pembayaran.php">Master Pembayaran</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="row">
          <div class="section" id="index-banner">
          <div class="container col s6 offset-s3 card-panel z-depth-3">
                <form action="updatepembayaran.php" method="post" style="margin-top:5%;">
                <h5><center>Ubah Pembayaran</center></h5>
                <?php
                  // terima no_bayar dari halaman pembayaran.php
                  $no_bayar = $_GET['no_bayar'];
                  $query    = mysql_query("select * from bayar where no_bayar='$no_bayar'");
                  $data     = mysql_fetch_array($query);
                  ?>
                  <div class="input-field col s12">
                      <i class="material-icons prefix">bookmark</i>
                      <input id="icon_prefix" type="text" class="validate" name="no_form" value="<?php echo $data['no_bayar']; ?>" disabled>
                      <label for="icon_prefix">Nomor Pembayaran</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">date_range</i>
                      <input type="date" class="validate" name="tgl_form" value="<?php echo $data['tgl_bayar']; ?>" disabled>
                  </div>
                  <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note</i>
                      <input type="text" class="validate" name="id_cln" value="<?php echo $data['no_form']; ?>" disabled>
                      <label for="icon_prefix">Nomor Formulir</label>
                  </div>
                  <div class="input-field col s12">
                      <i class="material-icons prefix">bookmark</i>
                      <input id="icon_prefix" type="text" class="validate" name="jml_bayar" value="<?php echo $data['jml_bayar']; ?>">
                      <label for="icon_prefix">Jumlah Bayar</label>
                  </div>
                    <div class="center col s12"><br>
                    <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="tambahData">Ubah Data Pembayaran<i class="material-icons right">send</i></button>
                    <br><br>
                  </div>
                  <input type="hidden" name="no_form" value="<?php echo $data['no_form']; ?>" />
              </form>
            </div>
          </div>
          </div>
        <center><span>Copyright 2016 Sistem Penerimaan Mahasiswa Baru</span></center>
  </body>
</html>
