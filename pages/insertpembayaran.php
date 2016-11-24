<?php
include_once('../koneksi.php');

// terima data dari halaman tambahpembayaran.php
$no_bayar      = mysql_real_escape_string($_POST['no_bayar']);
$tgl_bayar     = mysql_real_escape_string($_POST['tgl_bayar']);
$no_form       = mysql_real_escape_string($_POST['no_form']);
$nama_panitia  = mysql_real_escape_string($_POST['nama_panitia']);
$jml_bayar     = mysql_real_escape_string($_POST['jml_bayar']);

// simpan data ke database
if ($jml_bayar>249000) {
  $query = mysql_query("INSERT INTO bayar VALUES('$no_bayar', '$tgl_bayar', '$no_form', '$nama_panitia', '$jml_bayar')");
  if ($query) {
    // jika berhasil menyimpan
    header('location: pembayaran.php');
  } else {
    // jika gagal menyimpan
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Minimal Pembayaran Rp 250.000');\n".mysql_error();
  echo "window.location='pembayaran.php'";
  echo "</script>";
}
}else {
  echo "<script language=\"JavaScript\">\n";
  echo "alert('Gagal Menambahkan Pembayaran! Minimal Pembayaran Rp 250.000');\n".mysql_error();
  echo "window.location='pembayaran.php'";
  echo "</script>";
}

?>
