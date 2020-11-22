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
    <h1 class="h2">Tambah Tahun Ajaran</h1>
  </div>

<form action="add_tahun.php" method="POST">

<div class="form-group">
    <label> Tahun Ajaran:</label>
    <input type="text" name="tahun_ajaran" class="form-control" required>
</div>

<div class="form-group">
    <input type="submit" name="addTahun" value="Tambah" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
    <a class= "btn btn-info" href="data_tahun.php">Kembali</a>
</div>

<?php

include 'lib/tabletahun.php';

if(isset($_POST['addTahun'])) {

    $tahun_ajaran   =   $_POST['tahun_ajaran'];

    $Lib    = new Library();
    $add    = $Lib->addTahun($tahun_ajaran);
    if($add == 'Success') {
        header ('Location: data_tahun.php');
    }
}


?>

</form>

</main>
</body>
</html>