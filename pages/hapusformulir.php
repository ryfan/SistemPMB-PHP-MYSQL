<?php
include('../koneksi.php');
include_once('../cek-akses.php');

$no_form = $_GET['no_form'];

$query = mysql_query("DELETE FROM formulir WHERE no_form='$no_form'") or die(mysql_error());

if ($query) {
	header('location:formulir.php?msg=success');
} else {
	header('location:formulir.php?msg=failed');
}
?>
