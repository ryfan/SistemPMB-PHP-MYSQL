<?php
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}

// terima data dari halaman tambahcalonmhs.php
$id_cln   = mysql_real_escape_string($_POST['id_cln']);
$nama   = mysql_real_escape_string($_POST['nama']);
$alamat    = mysql_real_escape_string($_POST['alamat']);
$notelp = mysql_real_escape_string($_POST['notelp']);
$no_ijasah = mysql_real_escape_string($_POST['no_ijasah']);
$nem  = mysql_real_escape_string($_POST['nem']);

// simpan data ke database
$query = mysql_query("INSERT INTO calon_mhs VALUES('$id_cln', '$nama', '$alamat', '$notelp', '$no_ijasah', '$nem')");

if ($query) {
  // jika berhasil menyimpan
  header('location: calonmahasiswa.php');
} else {
  // jika gagal menyimpan
  header('location: calonmahasiswa.php');
}
?>
