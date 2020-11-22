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
   //cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location: ../../login.php?pesan=gagal");
  }
   
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Profil</h1>
  </div>

<?php

include "../../connection.php";

require ('lib/tableuser.php');

$username=$_SESSION['username'];

$q=mysqli_query($conn, "SELECT * FROM users where username='$username'");

while($data=mysqli_fetch_array($q)){
echo ' 

<form action="edit_user.php" method="POST">

<div class="form-group">
    <input type="text" name="id_akun" value="'.$data['id_akun'].'" class="form-control" hidden/><br>
</div>

<div class="form-group">
    <label> NISN:</label>
    <input type="text" name="nisn" class="form-control" value="'.$data['nisn'].'" required>
</div>
			
<div class="form-group">
    <label> Nama:</label>
    <input type="text" name="nama_panitia" class="form-control" value="'.$data['nama_panitia'].'" required>
</div>

<div class="form-group">
    <label> No. Telepon:</label>
    <input type="text" name="no_telp_panitia" class="form-control" value="'.$data['no_telp_panitia'].'" required>
</div>

<div class="form-group">
    <label> Email:</label>
    <input type="text" name="email_panitia" class="form-control" value="'.$data['email_panitia'].'" required>
</div>

<div class="form-group">
    <label> Username:</label>
    <input type="text" name="username" class="form-control" value="'.$data['username'].'" required>
</div>

<div class="form-group">
    <input type="submit" name="update" value="Update" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
</div>

</form>
';

if(isset($_POST['update'])){

  $id_akun         = $_POST['id_akun'];
  $nisn            = $_POST['nisn'];
  $nama_panitia    = $_POST['nama_panitia'];
  $email_panitia   = $_POST['email_panitia'];
  $no_telp_panitia = $_POST['no_telp_panitia'];
  $username        = $_POST['username'];

  $Lib = new Library();
  $upd = $Lib->updateProfil($id_akun, $nisn, $nama_panitia, $email_panitia, $no_telp_panitia, $username);
 
}

}
?>
</main>
</body>
</html>