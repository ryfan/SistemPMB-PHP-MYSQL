<?php
include('../koneksi.php');

if(empty($_SESSION['username'])){
header("location: ../login.php");
}

$id = $_GET['Id'];

$query = mysql_query("DELETE FROM users WHERE Id='$id'") or die(mysql_error());

if ($query) {
	header('location:user.php');
} else {
	header('location:user.php');
}
?>
