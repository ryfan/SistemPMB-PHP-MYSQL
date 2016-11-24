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
        <title>Tambah Pembayaran - Sistem Penerimaan Mahasiswa Baru</title>
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
                  <li><a href="pembayaran.php">Master Pembayaran</a></li>
                  <li><a href="../admin.php">Kembali</a></li>
                </ul>
              </div>
            </nav>
          </div>
          <div class="row">
          <div class="section" id="index-banner">
          <div class="container col s6 offset-s3 card-panel z-depth-3">
                <form action="insertpembayaran.php" method="post" style="margin-top:5%;">
                <h5><center>Tambah Data Pembayaran</center></h5>
                <div class="input-field col s12">
                    <i class="material-icons prefix">bookmark</i>
                    <input id="icon_prefix" type="text" class="validate" name="no_bayar" value="<?php echo autoNumber('no_bayar','bayar');?>" readonly>
                    <label for="icon_prefix">Nomor Pembayaran</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">date_range</i>
                    <input type="date" class="validate" name="tgl_bayar">
                </div>
                <div class="input-field col s12 m6">
                  <select name="no_form">
                    <option value="" disabled selected>Pilih Nomor Formulir</option>
                    <?php
                    $query = mysql_query("select * from formulir");
                    while ($data = mysql_fetch_array($query)){
        echo "<option value='$data[no_form]'>$data[no_form]</option>";
        }?>
</select>
    <label for="icon_prefix">Nomor Formulir</label>
                  </div>
                  <div class="input-field col s12 m6">
                      <i class="material-icons prefix">bookmark</i>
                      <input id="icon_prefix" type="text" class="validate" name="jml_bayar" placeholder="Rp. ">
                      <label for="icon_prefix">Jumlah Bayar</label>
                  </div>
                  <div class="input-field col s12 m6">
                    <?php
                    $id = $_SESSION['username'];
                    $query = mysql_query("select nama from users where username='$id'");
                    $hasil = mysql_fetch_assoc($query);
                    ?>
                      <i class="material-icons prefix">bookmark</i>
                      <input id="icon_prefix" type="text" class="validate" name="nama_panitia" value="<?php echo $hasil['nama'];?>" readonly>
                      <label for="icon_prefix">Nama Panitia</label>
                  </div>
                  <div class="center col s12"><br>
                  <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="tambahData">Tambah Data Pembayaran<i class="material-icons right">send</i></button>
                  <br><br>
                </div>
            </form>
          </div>
        </div>
        </div>
        <center><span>Copyright 2016 Sistem Penerimaan Mahasiswa Baru</span></center>
  </body>
</html>
