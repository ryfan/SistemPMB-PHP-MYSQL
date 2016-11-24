<?php
session_start();
include('koneksi.php');
include_once('cek-akses.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Selamat Datang, <?php echo $_SESSION['username']; ?> - Dashboard</title>
    <link rel="stylesheet" href="materialize/css/materialize.css" media="screen" title="materializecss" charset="utf-8">
    <link href="materialicon/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/font-awesome.min.css">
    <script src="jquery/jquery-1.12.2.js" charset="utf-8"></script>
    <script src="materialize/js/materialize.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="navbar-fixed">
        <nav class="indigo darken-4">
          <div class="nav-wrapper container">
            <a href="#!" class="brand-logo">Sistem PMB</a>
            <ul class="right hide-on-med-and-down">
              <li class="active"><a href="admin.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </nav>
      </div>
    <div class="section no-pad-bot">
      <div class="container">
          <div class="row">
              <div class="col l4 s12">
                  <div class="card-panel indigo darken-4 darken-2 center-align">
                      <i class="fa fa-file fa-5x white-text"></i><br>
                        <span class="white-text"><b>Master Data</b></span><hr><br>
                        <button class="btn waves-effect waves-light indigo darken-3" type="button" Onclick="window.location.href='pages/calonmahasiswa.php'">Calon Mahasiswa</button><br><br>
                        <button class="btn waves-effect waves-light indigo darken-3" type="button" Onclick="window.location.href='pages/user.php'">Users</button>
                  </div>
              </div>
              <div class="col l4 s12">
                  <div class="card-panel indigo darken-4 darken-2 center-align">
                      <i class="fa fa-list-alt  fa-5x white-text"></i><br>
                        <span class="white-text"><b>Transaksi</b></span><hr><br>
                        <button class="btn waves-effect waves-light indigo darken-3" type="button" Onclick="window.location.href='pages/formulir.php'">Formulir</button><br><br>
                        <button class="btn waves-effect waves-light indigo darken-3" type="button" Onclick="window.location.href='pages/pembayaran.php'">Pembayaran</button>
                  </div>
              </div>
              <div class="col l4 s12">
                  <div class="card-panel indigo darken-4 darken-2 center-align">
                      <i class="fa fa-files-o fa-5x white-text"></i><br>
                      <span class="white-text"><b>Laporan</b></span><hr><br>
                      <button class="btn waves-effect waves-light indigo darken-3" type="button" Onclick="window.location.href='pages/laporanformulir.php'">Cetak Formulir</button><br><br>
                      <button class="btn waves-effect waves-light indigo darken-3" type="button" Onclick="window.location.href='pages/laporanpembayaran.php'">Cetak Pembayaran</button>
                  </div>
              </div>
          </div>
      </div>
      <center><span>Copyright 2016 Sistem Penerimaan Mahasiswa Baru</span></center>
  </body>
</html>
