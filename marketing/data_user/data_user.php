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

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-0">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data User</h1>
  </div>

  <a href="add_user.php" class="btn btn-success" target="frmMain">Tambah User</a>
  <p></p>

<table class="table table-hover table-striped table-bordered" cellpadding="6">
    <tr>
        <th>Nomor</th>
        <th>NISN</th>
        <th>Nama Sekolah</th>
        <th>Nama Panitia</th>
        <th>Email Sekolah</th>
        <th>Email Panitia</th>
        <th>Tahun Ajaran</th>
        <th>No Telepon</th>
        <th>Username</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php
require("lib/tableuser.php");

$no   = 0;
$Lib  = new Library();
$show = $Lib->showUser();

while($data = $show->fetch(PDO::FETCH_LAZY)){
$no++;
echo "
<tr>
<th> $no </th>
<td>$data->nisn</td>
<td>$data->nama_sekolah</td>
<td>$data->nama_panitia</td>
<td>$data->email_sekolah</td>
<td>$data->email_panitia</td>
<td>$data->tahun_ajaran</td>
<td>$data->no_telp_panitia</td>
<td>$data->username</td>
<td><a class='btn btn-info' href='edit_user.php?id_akun=$data->id_akun' target='frmMain'>Edit</td>
<td><a class='btn btn-danger' href='data_user.php?delete=$data->id_akun'>Delete</a></td>
</tr>";
};
?>

<?php
if(isset($_GET['delete'])){
$del = $Lib->deleteUser($_GET['delete']);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_user.php" target="frmMain">';

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

