<?php
include('../koneksi.php');

if(empty($_SESSION['username'])){
header("location: ../login.php");
}

$id_cln = $_GET['id_cln'];

$query = mysql_query("delete from calon_mhs where id_cln='$id_cln'") or die(mysql_error());

if ($query) {
	header('location:calonmahasiswa.php?msg=success');
} else {
	header('location:calonmahasiswa.php?msg=failed');
}
?>
