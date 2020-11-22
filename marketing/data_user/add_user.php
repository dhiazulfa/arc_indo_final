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
    <h1 class="h2">Tambah User</h1>
  </div>

<form action="add_user.php" method="POST">

<label>Kode Sekolah</label>
<select name="id_sekolah" id="id_sekolah" class="form-control" onchange='changeValue(this.value)' required>
  
  <option value="">-Pilih-</option>

 <?php
 
 include "../../connection.php";
 
$query     = mysqli_query($conn, "SELECT * FROM daftar_sekolah order by id ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM daftar_sekolah");  
$jsArray   = "var prdName = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="id1"  value="' . $row['id'] . '">' . $row['kode_sekolah'] . '</option>';  
        $jsArray .= "prdName['" . $row['id'] . "'] = {nama_sekolah:'" . addslashes($row['nama_sekolah'])."'};\n";
   }

?>

</select>

<label>Tahun Ajaran</label>
<select name="id_thn" id="id_thn" class="form-control" onchange='changeValue2(this.value)' required>
  
  <option value="">-Pilih-</option>


 <?php
 
 include "../../connection.php";
 
$query     = mysqli_query($conn, "SELECT * FROM tahun_ajaran order by id_tahun ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM tahun_ajaran");  
$jsArray2   = "var prdName2 = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="id2"  value="' . $row['id_tahun'] . '">' . $row['tahun_ajaran'] . '</option>';  
        $jsArray2 .= "prdName2['" . $row['id_tahun'] . "'] = {tahun_ajaran:'" . addslashes($row['tahun_ajaran'])."'};\n";
   }

?>

</select>

<div class="form-group">
    <label> NISN: </label> 
    <input type="text" name="nisn" class="form-control" onkeypress="return number(event)" value="0" readonly>
</div>

<div class="form-group">
    <label> Nama Sekolah:</label>
    <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control" readonly>
</div>

<div class="form-group">
    <label> Nama Panitia:</label>
    <input type="text" name="nama_panitia" class="form-control" value="Siswa" readonly>
</div>


<div class="form-group">
    <label>Email Panitia:</label>
    <input type="text" name="email_panitia" class="form-control" value="siswa@gmail.com" readonly>
    
</div>

<div class="form-group">
    <label>No. Telepon:</label>
    <input type="text" name="no_telp_panitia" class="form-control" onkeypress="return number(event)" value="080000000000" readonly>
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
    <input type="submit" name="addUser" value="Tambah" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
    <a class= "btn btn-info" href="data_user.php">Kembali</a>
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

<script type="text/javascript"> 

<?php
    echo $jsArray;
    echo $jsArray2;
?>

function changeValue(id){
    document.getElementById('nama_sekolah').value = prdName[id].nama_sekolah;
};

function changeValue2(id_tahun){
    document.getElementById('tahun_ajaran').value = prdName2[id_tahun].tahun_ajaran;
};

</script>

<?php

include 'lib/tableuser.php';

if(isset($_POST['addUser'])) {
    $id_sekolah      =   $_POST['id_sekolah'];
    $id_thn          =   $_POST['id_thn'];
    $nisn            =   $_POST['nisn'];
    $nama_panitia    =   $_POST['nama_panitia'];
    $email_panitia   =   $_POST['email_panitia'];
    $no_telp_panitia =   $_POST['no_telp_panitia'];
    $username        =   $_POST['username'];
    $password        =   md5($_POST['password']);

    $Lib    = new Library();
    $add    = $Lib->addUser($id_sekolah, $id_thn, $nisn, $nama_panitia, $email_panitia, $no_telp_panitia, 
    $username, $password);
    if($add == 'Success') {
        echo '<script language="javascript"> alert("User baru telah dibuat!"); document.location="data_user.php"; </script>';
    }
}

?>

</form>

</main>
</body>
</html>