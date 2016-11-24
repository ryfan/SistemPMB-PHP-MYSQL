<?php
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}

// terima data dari halaman tambahcalonmhs.php
$username   = mysql_real_escape_string($_POST['username']);
$password    = mysql_real_escape_string($_POST['password']);
$nama = mysql_real_escape_string($_POST['nama']);

// simpan data ke database
$query = mysql_query("INSERT INTO users VALUES('', '$username', '$password', '$nama')");

if ($query) {
  // jika berhasil menyimpan
  header('location: user.php');
} else {
  // jika gagal menyimpan
  header('location: user.php');
}
?>
