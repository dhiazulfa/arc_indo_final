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
    <h1 class="h2">Edit Profil</h1>
  </div>

<?php

include "../../connection.php";

require ('lib/data_admin.php');

$username = $_SESSION['username'];

$q = mysqli_query($conn, "SELECT * FROM pegawai where username='$username'");

while($data=mysqli_fetch_array($q)){
echo ' 

<form action="edit_profil.php" method="POST">

<div class="form-group">
    <input type="text" name="id_pgw" value="'.$data['id_pgw'].'" class="form-control" hidden/><br>
</div>

<div class="form-group">
    <label> No KTP:</label>
    <input type="text" name="no_ktp" class="form-control" value="'.$data['no_ktp'].'" required>
</div>
			
<div class="form-group">
    <label> Nama:</label>
    <input type="text" name="nama" class="form-control" value="'.$data['nama'].'" required>
</div>

<div class="form-group">
    <label> Email:</label>
    <input type="text" name="email" class="form-control" value="'.$data['email'].'" required>
</div>

<div class="form-group">
    <label> Username:</label>
    <input type="text" name="username" class="form-control" value="'.$data['username'].'" required>
</div>

<div class="form-group">
    <label> Password Baru:</label>
    <input type="password" name="password" class="form-control" required>
</div>


<div class="form-group">
    <input type="submit" name="update" value="Update" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
</div>

</form>
';

if(isset($_POST['update'])){

  $id_pgw   = $_POST['id_pgw'];
  $no_ktp    = $_POST['no_ktp'];
  $nama      = $_POST['nama'];
  $email     = $_POST['email'];
  $username  = $_POST['username'];
  $password  = md5($_POST['password']); 

  $Lib = new Marketing();
  $upd = $Lib->updateProfil($id_pgw, $no_ktp, $nama, $email, $username, $password);
 
}

}
?>
</main>
</body>
</html>