<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

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
    <h1 class="h2">Profil Panitia</h1>
  </div>

<table class="table table-hover table-striped">
    <tr>
        <td>ID</td>
        <td>NISN</td>
        <td>Nama Panitia</td>
        <td>Asal Sekolah</td>
        <td>Tahun Ajaran</td>
        <td>Email</td>
        <td>No. Telepon</td>
        <td>Username</td>
        <td>Edit</td>
    </tr>

<?php
include "../../connection.php";

$username=$_SESSION['username'];

$q = mysqli_query($conn, "SELECT tahun_ajaran.id_tahun, tahun_ajaran.tahun_ajaran, users.id_akun, users.id_sekolah, users.id_thn,daftar_sekolah.id, daftar_sekolah.nama_sekolah, daftar_sekolah.email_sekolah, users.nisn, 
users.nama_panitia, users.email_panitia, users.no_telp_panitia, users.username 
FROM users INNER JOIN daftar_sekolah ON users.id_sekolah = daftar_sekolah.id INNER JOIN tahun_ajaran ON users.id_thn = tahun_ajaran.id_tahun AND username='$username'");

while($data=mysqli_fetch_array($q)){
echo '

<tr>
<td> '. $data['id_akun'] .'</td>
<td> '. $data['nisn'] .'</td>
<td> '. $data['nama_panitia'] .'</td>
<td> '. $data['nama_sekolah'] .'</td>
<td> '. $data['tahun_ajaran'] .'</td>
<td> '. $data['email_panitia'] .'</td>
<td> '. $data['no_telp_panitia'] .'</td>
<td> '. $data['username'] .'</td>
<td><a class="btn btn-info" href="edit_user.php?id_akun='. $data['id_akun'] .'" target="frmMain">Edit</td>

</tr>

';

}
?>

</table>


</main>  

</body>
</html>