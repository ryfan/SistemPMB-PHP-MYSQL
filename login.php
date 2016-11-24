<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login - Sistem Penerimaan Mahasiswa Baru</title>
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="materialize/css/custom.css">
    <link href="materialicon/icon.css" rel="stylesheet">
    <script src="jquery/jquery-1.12.2.js" charset="utf-8"></script>
    <script src="materialize/js/materialize.js" charset="utf-8"></script>
    <style media="screen">
    body {
margin:0 auto 0;
background:url(images/background.jpg) repeat;
}
    </style>
  </head>
<body>
  <div class="row">
  <div class="section no-pad-bot" id="index-banner" style="margin-top:10%;">
  <div class="container col s6 offset-s3 card-panel z-depth-3">
      	<form action="auth.php" method="post">
        <!-- Login Form -->
        <br>
        <h5><center>Login Admin Dashboard</center></h5>
  			<div class="input-field col s12">
        		<i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix" type="text" class="validate" name="username" required>
            <label for="icon_prefix">Username</label>
        </div>
  			<div class="input-field col s12">
        		<i class="material-icons prefix">vpn_key</i>
            <input id="icon_prefix" type="password" class="validate" name="password" required>
            <label for="icon_prefix">Password</label>
        </div>
        <!-- Button Login & Lupa password -->
      		<div class="center">
          <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="login">Masuk<i class="material-icons right">send</i></button>
        </div>
  	</form>
    <p class="center"> Copyright 2016 </p>
  </div>
</div>
</div>

<?php
session_start();
session_destroy();
?>

  </body>
</html>
