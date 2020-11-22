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
    <h1 class="h2">Data Tahun Ajaran</h1>
  </div>

<table class="table table-hover table-striped table-bordered" cellpadding="8">
    <tr>
        <th>Nomor</th>
        <th>Tahun Ajaran</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php
require("lib/tabletahun.php");
$Lib = new Library();
$show = $Lib->showTahun();
while($data = $show->fetch(PDO::FETCH_OBJ)){
echo "
<tr>
<td>$data->id_tahun</td>
<td>$data->tahun_ajaran</td>
<td><a class='btn btn-info' href='edit_tahun.php?id_tahun=$data->id_tahun' target='frmMain'>Edit</td>
<td><a class='btn btn-danger' href='data_tahun.php?delete=$data->id_tahun'>Delete</a></td>
</tr>";
};
?>

<?php
if(isset($_GET['delete'])){
$del = $Lib->deleteTahun($_GET['delete']);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_tahun.php" target="frmMain">';

}
?>

</table>
<a href="add_tahun.php" class="btn btn-success" target="frmMain">Tambah Tahun Ajaran</a>

</main>  

</body>
</html>

