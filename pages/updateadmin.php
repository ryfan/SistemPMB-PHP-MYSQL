<?php
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}

// terima data dari halaman ubahadmin.php
$id          = mysql_real_escape_string($_POST['id']);
$username     = mysql_real_escape_string($_POST['username']);
$password     = mysql_real_escape_string($_POST['password']);
$nama         = mysql_real_escape_string($_POST['nama']);

// simpan data ke database
$query = mysql_query("UPDATE users set username='$username', password='$password', nama='$nama' WHERE Id='$id'") or die(mysql_error());

if ($query) {
  // jika berhasil menyimpan
  header('location: user.php');
} else {
  // jika gagal menyimpan
  header('location: user.php');
}
?>
