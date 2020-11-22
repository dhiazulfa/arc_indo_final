<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configurasi Akun</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/animate.css">
</head>
<body>

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../../admin-login.php?pesan=gagal");
	}
 
	?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profil</h1>
  </div>

<?php

include "../../connection.php";

$username = $_SESSION['username'];

$q = mysqli_query($conn, "SELECT * FROM pegawai where username='$username'");

while($data=mysqli_fetch_array($q)){
echo ' 

<form action="profil.php" method="POST">

<div class="form-group">
    <label> No KTP:</label>
    <input type="text" name="no_ktp" class="form-control" value="'.$data['no_ktp'].'" readonly/>
</div>
			
<div class="form-group">
    <label> Nama:</label>
    <input type="text" name="nama" class="form-control" value="'.$data['nama'].'" readonly/>
</div>

<div class="form-group">
    <label> Email:</label>
    <input type="text" name="email" class="form-control" value="'.$data['email'].'" readonly/>
</div>

<div class="form-group">
    <label> Username:</label>
    <input type="text" name="username" class="form-control" value="'.$data['username'].'" readonly/>
</div>

<div class="form-group">
<a class="btn btn-success" href="edit_profil.php" target="frmMain"> Edit Profil </a>
</div>

</form>
';

}
?>

</main>
</body>
</html>