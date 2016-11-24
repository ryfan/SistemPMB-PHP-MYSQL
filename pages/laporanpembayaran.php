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
    <title>Laporan Formulir - Sistem Penerimaan Mahasiswa Baru</title>
    <link rel="stylesheet" href="../materialize/css/materialize.css" type="text/css" />
    <link rel="stylesheet" href="../materialize/css/custom.css" type="text/css" />
    <link href="../materialicon/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/font-awesome.min.css">
    <script src="../jquery/jquery-1.12.2.js"></script>
  </head>
  <body>
    <div class="navbar-fixed">
        <nav class="indigo darken-4">
          <div class="nav-wrapper container">
            <a href="#!" class="brand-logo">Sistem PMB</a>
            <ul class="right hide-on-med-and-down">
              <li class="active"><a href="laporanpembayaran.php">Laporan Pembayaran</a></li>
              <li><a href="../admin.php">Kembali</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <br>
      <div class="row">
      <div class="container col s6 offset-s3 card-panel z-depth-3">
              <form action="laporanpembayaranfilter.php" method="get" style="margin-top:5%;">
              <div class="input-field col s2 m6">
                <span>Dari Tanggal</span><br>
                <i class="material-icons prefix">date_range</i>
                  <input type="date" class="validate" name="daritanggal" required>
              </div>
              <div class="input-field col s2 m6">
                <span>Sampai Tanggal</span><br><i class="material-icons prefix">date_range</i>
                  <input type="date" class="validate" name="sampaitanggal" required>
              </div>
                <div class="center col s12"><br>
                <button class="btn waves-effect waves-light indigo darken-4" type="submit">Lihat Laporan Berdasarkan Tanggal<i class="material-icons right">send</i></button><br><br>
                <button class="btn waves-effect red darken-2" type="button" Value="Kembali" Onclick="window.location.href='laporanpembayarankeseluruhan.php'">Lihat Laporan Keseluruhan</button>
                <br><br>
              </div>
              </form>
        </div>
        <br><br>
        </div>
      </div>
        <div class="row center foot"> Copyright 2016 - Sistem Penerimaan Mahasiswa Baru STMIK DHARMA PUTRA</div>
        <script src="../materialize/js/materialize.js"></script>
    </body>
</html>
