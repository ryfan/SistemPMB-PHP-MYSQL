<?php
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}

//tangkap data dari form ubahcalonmhs.php
$id_cln   = mysql_real_escape_string($_POST['id_cln']);
$nama   = mysql_real_escape_string($_POST['nama']);
$alamat    = mysql_real_escape_string($_POST['alamat']);
$notelp = mysql_real_escape_string($_POST['notelp']);
$no_ijasah = mysql_real_escape_string($_POST['no_ijasah']);
$nem  = mysql_real_escape_string($_POST['nem']);

//update data di database sesuai id_cln
$query = mysql_query("update calon_mhs set nama='$nama', alamat='$alamat', notelp='$notelp', no_ijasah='$no_ijasah', nem='$nem' where id_cln='$id_cln'") or die(mysql_error());

if ($query) {
	header('location:calonmahasiswa.php?msg=success');
} else {
	header('location:calonmahasiswa.php?msg=failed');
}
?>
