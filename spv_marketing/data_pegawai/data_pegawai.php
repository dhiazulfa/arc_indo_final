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
    <h1 class="h2">Data Pegawai</h1>
  </div>

  <p><a href="add_user.php" class="btn btn-success" target="frmMain">Tambah Pegawai</a></p>

<table class="table table-hover table-striped table-bordered">
    <tr>
        <th>Nomor</th>
        <th>No. KTP</th>
        <th>Nama</th>
        <th>No. Telpon</th>
        <th>Jabatan</th>
        <th>Email</th>
        <th>Username</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php
require("lib/tableuser.php");
$Lib = new Library();
$no  = 0;
$show = $Lib->showPegawai();
while($data = $show->fetch(PDO::FETCH_LAZY)){
$no++;
  echo "
<tr>
<td>$no</td>
<td>$data->no_ktp</td>
<td>$data->nama</td>
<td>$data->no_telp</td>
<td>$data->jabatan</td>
<td>$data->email</td>
<td>$data->username</td>
<td><a class='btn btn-info' href='edit_user.php?id_pgw=$data->id_pgw' target='frmMain'>Edit</td>
<td><a class='btn btn-danger' href='data_pegawai.php?delete=$data->id_pgw'>Delete</a></td>
</tr>";
};
?>

<?php
if(isset($_GET['delete'])){
$del = $Lib->deletePegawai($_GET['delete']);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_pegawai.php" target="frmMain">';

}
?>

</table>

</main>  

<!-- This is JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../assets/js/myjs.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

</body>
</html>

