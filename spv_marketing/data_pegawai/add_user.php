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
		header("location:../admin-login.php?pesan=gagal");
	}
 
	?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Pegawai</h1>
  </div>

<form action="add_user.php" method="POST">

<div class="form-group">
    <label> No. KTP: </label> 
    <input type="text" name="no_ktp" class="form-control" onkeypress="return number(event)" required>
</div>

<div class="form-group">
    <label> Nama:</label>
    <input type="text" name="nama" class="form-control" required>
</div>

<div class="form-group">
    <label>No. Telepon:</label>
    <input type="text" name="no_telp" class="form-control" onkeypress="return number(event)" required>
</div>

<div class="form-group">
    <label>Jabatan:</label>
    <input type="text" name="jabatan" class="form-control" value="marketing" readonly>
</div>

<div class="form-group">
    <label>Email:</label>
    <input type="text" name="email" class="form-control" required>
    
</div>

<div class="form-group">
    <label>Username:</label>
    <input type="text" name="username" class="form-control" required>
</div>

<div class="form-group">
    <label>Password:</label>
    <input type="password" name="password" class="form-control" required>
</div>

<div class="form-group">
    <input type="submit" name="addPe gawai" value="Tambah" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
    <a class= "btn btn-info" href="data_pegawai.php">Kembali</a>
</div>

<!-- Ini JS-->
<script type="text/javascript">
		function number(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>

<?php

include 'lib/tableuser.php';

if(isset($_POST['addPegawai'])) {
    $no_ktp     =   $_POST['no_ktp'];
    $nama       =   $_POST['nama'];
    $no_telp    =   $_POST['no_telp'];
    $jabatan    =   $_POST['jabatan'];
    $email      =   $_POST['email'];
    $username   =   $_POST['username'];
    $password   =   md5($_POST['password']);

    $Lib    = new Library();
    $add    = $Lib->addPegawai($no_ktp, $nama, $no_telp, $jabatan, $email, $username, $password);
    if($add == 'Success') {
        echo '<script language="javascript"> alert("User baru telah dibuat!"); document.location="data_user.php"; </script>';
    }
}

?>

</form>

</main>
</body>
</html>