<?php
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}



// Baca lokasi file sementara dan nama file dari form tambahformulir.php
$lokasi_file = $_FILES['uploaddokumen']['tmp_name'];
$nama_file   = $_FILES['uploaddokumen']['name'];
// Tentukan folder untuk menyimpan file
$folder = "../dokumen/$nama_file";
// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file,"$folder")){

  $query = "UPDATE formulir set (no_form, tgl_form, id_cln, dokumen)
            VALUES('$_POST[no_form]', '$_POST[tgl_form]', '$_POST[id_cln]', '$_POST[namadokumen]') WHERE no_form='$_POST[no_form]''";
            mysql_query($query);
  header('location: formulir.php');
}
else{
  header('location: formulir.php');
}
?>
