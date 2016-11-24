<?php
// host yang digunakan
$host = 'localhost';
// username untuk login ke host
$user = 'root';
// secara default xampp password kosong
$pass = '';
// nama database
$dbname = 'skripsi_pmb';
// mengubung ke host
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
// memilih database yang akan digunakan
$dbselect = mysql_select_db($dbname);
?>
