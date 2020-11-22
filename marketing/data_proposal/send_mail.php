<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Proposal</title>
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
    <h1 class="h2">Kirim Proposal</h1>
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

<?php
   
    }

?>

<label>Kode Sekolah</label>
<select name="id_sekolah" id="id_sekolah" class="form-control" onchange='changeValue(this.value)' required>
  
<option value="">-Pilih-</option>

 <?php
 
 include "../../connection.php";
 
$query     = mysqli_query($conn, "SELECT * FROM daftar_sekolah order by id ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM daftar_sekolah");  
$jsArray   = "var prdName = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="id"  value="' . $row['id'] . '">' . $row['kode_sekolah'] . '</option>';  
        $jsArray .= "prdName['" . $row['id'] . "'] = {nama_sekolah:'" . addslashes($row['nama_sekolah']) ."', 
        email_sekolah:'".addslashes($row['email_sekolah'])."'};\n";
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
    <label> No:</label>
    <input type="text" name="no_proposal" class="form-control" required>
</div>

<div class="form-group">
    <label> Tanggal:</label>
    <input name="tgl_kirim" class="form-control" value=" <?php echo date('d/m/Y'); ?> " readonly>
</div>

<div class="form-group">
    <label> Subjek/Perihal:</label>
    <input type="text" name="subjek" class="form-control" required>
</div>


<div class="form-group">
    <label> Nama Sekolah:</label>
    <input type="text" name="nama_tujuan" id="nama_sekolah" class="form-control" required>
</div>

<div class="form-group">
    <label> Email Tujuan: </label>
    <input type="email" name="email_tujuan" id="email_sekolah" class="form-control" required> 
    <!-- <input type="text" name="email_tujuan" id="email_sekolah" class="form-control" required> -->
</div>

<div class="form-group">
    <label>Pesan:</label>
    <textarea class="form-control" name="pesan" rows="8"></textarea>
</div>

<div class="form-group">
    <label>File Proposal:</label>
    <input type="file" name="file_proposal" class="form-control" required>
</div>

<div class="form-group">
    <input type="submit" name="sendMail" value="Kirim" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
</div>

</form>

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
    document.getElementById('email_sekolah').value = prdName[id].email_sekolah;
};

function changeValue2(id_tahun){
    document.getElementById('tahun_ajaran').value = prdName2[id_tahun].tahun_ajaran;
};

</script>


</main>

</body>
</html>