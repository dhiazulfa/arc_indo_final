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
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../../admin-login.php?pesan=gagal");
	}
 
	?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Sekolah</h1>
  </div>

<form action="add_sekolah.php" method="POST">

<div class="form-group">
    <label> Kode Sekolah: </label> 
    <input type="text" name="kode_sekolah" class="form-control" required>
</div>

<div class="form-group">
    <label> Nama Sekolah:</label>
    <input type="text" name="nama_sekolah" class="form-control" required>
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Email Sekolah:</label>
    <input type="email" name="email_sekolah" id="exampleInputEmail1" class="form-control" required>
</div>

<div class="form-group">
    <label>No. Telepon:</label>
    <input type="text" name="telepon" class="form-control" onkeypress="return number(event)" required>
</div>

<div class="form-group">
    <label>Alamat</label> <br>
    <textarea name="alamat" cols="50" rows="5"></textarea>    
</div>

<div class="form-group">
    <input type="submit" name="addSekolah" value="Tambah" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
    <a class= "btn btn-info" href="data_sekolah.php">Kembali</a>
</div>

<!-- Ini JS-->
<script>
		function number(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>

<?php

include 'lib/tablesekolah.php';

if(isset($_POST['addSekolah'])) {
    $kode_sekolah    =   $_POST['kode_sekolah'];
    $nama_sekolah    =   $_POST['nama_sekolah'];
    $email_sekolah   =   $_POST['email_sekolah'];
    $telepon         =   $_POST['telepon'];
    $alamat          =   $_POST['alamat'];

    $Lib    = new Library();
    $add    = $Lib->addSekolah($kode_sekolah, $nama_sekolah, $email_sekolah, $telepon, $alamat);
    if($add == 'Success') {
        header ('Location: data_sekolah.php');
    }
}


?>

</form>

</main>
</body>
</html>