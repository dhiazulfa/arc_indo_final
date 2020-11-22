<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kirim Mou</title>
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
    <h1 class="h2">Kirim MOU</h1>
  </div>

<?php
include "../../connection.php";

$username=$_SESSION['username'];

$q = mysqli_query($conn, "SELECT * FROM pegawai WHERE username='$username'");

while ($data = mysqli_fetch_array($q)){
echo ' 

<form action="send.php" enctype="multipart/form-data" method="POST">

<div class="form-group" hidden>
    <label> ID Pegawai:</label>
    <input type="text" name="id_pegawai" class="form-control" value="'. $data['id_pgw'] .'" readonly/>
</div>

<div class="form-group">
    <label> Nama Pengirim:</label>
    <input type="text" name="nama_pengirim" class="form-control" value="'. $data['nama'] .'" readonly/>
</div>

' ?>


<label>Pilih Tujuan</label>
<select name="akun_tujuan" id="akun_tujuan" class="form-control" onchange='changeValue(this.value)' required>
  
<option value="">-Pilih-</option>

 <?php
 
 include "../../connection.php";
 
$query     = mysqli_query($conn, "SELECT * FROM users order by id_akun ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM users INNER JOIN daftar_sekolah WHERE users.id_sekolah = daftar_sekolah.id ");  
$jsArray   = "var prdName = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="id1"  value="' . $row['id_akun'] . '">' . $row['nama_sekolah'] . '</option>';  
        $jsArray .= "prdName['" . $row['id_akun'] . "'] = { id_akun:'" . addslashes($row['id_akun']) ."', nama_sekolah:'" . addslashes($row['nama_sekolah']) ."', 
            nama_panitia:'".addslashes($row['nama_panitia'])."', email_panitia:'".addslashes($row['email_panitia'])."'};\n";
   }

?>

</select>

<div class="form-group" hidden>
    <label> ID Akun:</label>
    <input type="text" name="id_akun" id="id_akun" class="form-control" required>
</div>


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


<label>Nomor Proposal</label>
<select name="id_status" id="id_status" class="form-control" onchange='changeValue3(this.value)' required>
  
  <option value="">-Pilih-</option>


 <?php
 
 include "../../connection.php";
 
$query     = mysqli_query($conn, "SELECT * FROM proposal_status order by id_status ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM proposal_status INNER JOIN kirim_proposal WHERE proposal_status.id_proposal = kirim_proposal.id");  
$jsArray3   = "var prdName3 = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="id3"  value="' . $row['id_status'] . '">' . $row['no_proposal'] . '</option>';  
        $jsArray2 .= "prdName3['" . $row['id_status'] . "'] = {no_proposal:'" . addslashes($row['no_proposal'])."'};\n";
   }

?>

</select>


<?php

echo '

<div class="form-group">
    <label> No. MOU:</label>
    <input type="text" name="no_mou" class="form-control" required>
</div>

<div class="form-group">
    <label> Subjek/Perihal:</label>
    <input type="text" name="subjek" class="form-control" required>
</div>

' ?>

<div class="form-group">
    <label> Nama Sekolah:</label>
    <input type="text" name="nama_tujuan" id="nama_sekolah" class="form-control" required>
</div>

<div class="form-group">
    <label> Nama Panitia:</label>
    <input type="text" name="nama_panitia" id="nama_panitia" class="form-control" required>
</div>

<div class="form-group">
    <label> Email Tujuan: </label>
    <input type="email" name="email_tujuan" id="email_panitia" class="form-control" required> 
    <!-- <input type="text" name="email_tujuan" id="email_panitia" class="form-control"> -->
</div>

<div class="form-group">
    <label> Tanggal:</label>
    <input name="tgl_kirim" class="form-control" value=" <?php echo date('d/m/Y'); ?> " readonly>
</div>

<?php echo '

<div class="form-group">
    <label>Pesan:</label>
    <textarea class="form-control" name="pesan" rows="8" required></textarea>
</div>

<div class="form-group">
    <label>File Proposal:</label>
    <input type="file" name="file_mou" class="form-control" required>
</div>

<div class="form-group">
    <input type="submit" name="sendMail" value="Kirim" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
</div>
</form>
';
}
?>


<!-- Ini JS-->
<script type="text/javascript"> 

<?php
    echo $jsArray;
    echo $jsArray2;
    echo $jsArray3;
?>

function changeValue(id_akun){
    document.getElementById('id_akun').value = prdName[id_akun].id_akun;
    document.getElementById('nama_sekolah').value = prdName[id_akun].nama_sekolah;
    document.getElementById('nama_panitia').value = prdName[id_akun].nama_panitia;
    document.getElementById('email_panitia').value = prdName[id_akun].email_panitia;
};

function changeValue2(id_tahun){
    document.getElementById('tahun_ajaran').value = prdName2[id_tahun].tahun_ajaran;
};

function changeValue3(id_status){
    document.getElementById('no_proposal').value = prdName3[id_status].no_proposal;
};

</script>


</main>

</body>
</html>