<?php
include('../koneksi.php');

if(empty($_SESSION['username'])){
header("location: ../login.php");
}

$no_bayar = $_GET['no_bayar'];

$query = mysql_query("DELETE FROM bayar WHERE no_bayar='$no_bayar'") or die(mysql_error());

if ($query) {
	header('location:pembayaran.php?msg=success');
} else {
	header('location:pembayaran.php?msg=failed');
}
?>
