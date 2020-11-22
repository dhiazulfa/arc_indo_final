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
    <h1 class="h2">Data Sekolah</h1>
  </div>

<table class="table table-hover table-striped table-bordered">
    <tr>
        <th>Nomor</th>
        <th>Kode Sekolah</th>
        <th>Nama Sekolah</th>
        <th>Email Sekolah</th>
        <th>No. Telepon</th>
    </tr>

<?php
require("lib/tablesekolah.php");
$Lib = new Library();
$no  = 0;
$show = $Lib->showSekolah();
while($data = $show->fetch(PDO::FETCH_OBJ)){
$no++;
echo "
<tr>
<th> $no </th>
<td>$data->kode_sekolah</td>
<td>$data->nama_sekolah</td>
<td>$data->email_sekolah</td>
<td>$data->telepon</td>
</tr>";
};
?>

</main>  

</body>
</html>

