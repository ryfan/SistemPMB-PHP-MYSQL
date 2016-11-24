<?php
session_start();
include_once('../koneksi.php');
if(empty($_SESSION['username'])){
header("location: ../login.php");
}

function autoNumber($id, $table){
  $query = 'SELECT MAX(RIGHT('.$id.', 4)) as max_id FROM '.$table.' ORDER BY '.$id;
  $result = mysql_query($query);
  $data = mysql_fetch_array($result);
  $id_max = $data['max_id'];
  $sort_num = (int) substr($id_max, 1, 4);
  $sort_num++;
  $new_code = sprintf("%04s", $sort_num);
  return $new_code;
 }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Tambah Formulir - Master Data Formulir</title>
        <link rel="stylesheet" href="../materialize/css/materialize.css">
        <link rel="stylesheet" href="../materialize/css/custom.css">
        <link href="../materialicon/icon.css" rel="stylesheet">
        <link rel="stylesheet" href="../fontawesome/font-awesome.min.css">
        <script src="../jquery/jquery-1.12.2.js" charset="utf-8"></script>
        <script src="../materialize/js/select.js" charset="utf-8"></script>
        <script src="../materialize/js/materialize.js" charset="utf-8"></script>
      </head>
      <body>
        <div class="navbar-fixed">
            <nav class="indigo darken-4">
              <div class="nav-wrapper container">
                <a href="#!" class="brand-logo">Sistem PMB</a>
                <ul class="right hide-on-med-and-down">
                  <li><a href="formulir.php">Master Data Formulir</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="row">
          <div class="section" id="index-banner">
          <div class="container col s6 offset-s3 card-panel z-depth-3">
          <form action="insertformulir.php" method="post" style="margin-top:5%;" enctype="multipart/form-data">
                <h5><center>Tambah Data Formulir</center></h5>
                <div class="input-field col s12">
                    <i class="material-icons prefix">bookmark</i>
                    <input id="icon_prefix" type="text" class="validate" name="no_form" value="<?php echo autoNumber('no_form','formulir');?>" readonly>
                    <label for="icon_prefix">Nomor Formulir</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">date_range</i>
                    <input type="date" class="validate" name="tgl_form">
                </div>
                <div class="input-field col s12 m6">
                  <select name="id_cln">
                    <option value="" disabled selected>Pilih Nomor Mahasiswa</option>
                    <?php
                    $query = mysql_query("select * from calon_mhs");
                    while ($data = mysql_fetch_array($query)){
        echo "<option value='$data[id_cln]'>$data[id_cln] - $data[nama]</option>";
        }?>
</select>
    <label for="icon_prefix">Nomor Mahasiswa</label>
                  </div>
                <div class="input-field col s12">
                  <div class="file-field input-field">
                      <div class="btn">
                        <span>Pilih File</span>
                          <input name="file" type="file" multiple="multiple" />
                      </div>
                  <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Upload Dokumen" name="namadokumen">
    </div>
  </div>
                </div>
                  <div class="center col s12"><br>
                  <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="submit">Tambah Data Formulir<i class="material-icons right">send</i></button>
                  <br><br>
                </div>
            </form>
          </div>
        </div>
        </div>
        <center><span>Copyright 2016 Sistem Penerimaan Mahasiswa Baru</span></center>
  </body>
</html>
