<?php
include('../koneksi.php');

if(isset($_POST['submit']))
{

	$noform       = mysql_real_escape_string($_POST['no_form']);
	$tglform      = mysql_real_escape_string($_POST['tgl_form']);
	$idcln        = mysql_real_escape_string($_POST['id_cln']);
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
  $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="../dokumen/";

	// new file size in KB
	$new_size = $file_size/1024;
	// new file size in KB

	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case

	$final_file=str_replace(' ','-',$new_file_name);

	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO formulir VALUES('$noform', '$tglform', '$idcln', '$final_file','$file_type','$new_size')";
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='../pages/formulir.php';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='../pages/tambahformulir.php';
        </script>
		<?php
	}
}
?>
