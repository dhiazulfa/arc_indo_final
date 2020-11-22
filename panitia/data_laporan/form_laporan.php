<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Persetujuan</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/animate.css">

    <script type="text/javascript">
    
        function one_click_bro(status){
            document.getElementById("block").disabled = status;
    }
    
    </script>

</head>
<body>

<?php 
session_start();
   //cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location: ../../login.php?pesan=gagal");
  }
   
?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Persetujuan</h1>
  </div>

<?php
include "../../connection.php";

$username=$_SESSION['username'];

$q = mysqli_query($conn, "SELECT users.id_akun, users.id_sekolah, daftar_sekolah.id, users.nisn, daftar_sekolah.nama_sekolah, users.nama_panitia,
users.email_panitia, users.no_telp_panitia
FROM users INNER JOIN daftar_sekolah WHERE users.id_sekolah = daftar_sekolah.id AND username='$username'");

while ($data = mysqli_fetch_array($q)){
echo ' 




<form action="send.php" enctype="multipart/form-data" method="POST">

<div class="form-group" hidden>
    <label> ID User:</label>
    <input type="text" name="id_akun" class="form-control" value="'. $data['id_akun'] .'" readonly/>
</div>

' ?>

<label>Nama Paket</label>
<select name="nama_paket" id="nama_paket" class="form-control" onchange='changeValue(this.value)' required>
  
<option value="">-Pilih-</option>

 <?php
 
 include "../../connection.php";
 
$query     = mysqli_query($conn, "SELECT * FROM daftar_paket order by id ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM daftar_paket");  
$jsArray   = "var prdName = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="jenis_paket"  value="' . $row['id_paket'] . '">' . $row['jenis_paket'] . '</option>';  
        $jsArray .= "prdName['" . $row['id_paket'] . "'] = {id_paket:'" . addslashes($row['id_paket'])."',
             harga:'" . addslashes($row['harga'])."'};\n";
    }

?>

</select>

<div class="form-group" hidden>
    <label> ID Paket:</label>
    <input type="text" name="id_paket" id="id_paket" class="form-control" required>
</div>

<div class="form-group">
    <label> Harga Paket:</label>
    <input type="text" name="harga" id="harga" class="form-control" required readonly/>
</div>

<?php

echo '

<div class="form-group">
    <label> NISN:</label>
    <input type="text" name="nisn" class="form-control" value="'. $data['nisn'] .'" readonly/>
</div>
			
<div class="form-group">
    <label> Nama Sekolah:</label>
    <input type="text" name="nama_sekolah" class="form-control" value="'. $data['nama_sekolah'] .' " readonly/>
</div>

<div class="form-group">
    <label> Nama Panitia:</label>
    <input type="text" name="nama_panitia" class="form-control" value="'. $data['nama_panitia'] .' " readonly/>
</div>

<div class="form-group">
    <label> Email Panitia:</label>
    <input type="text" name="email_panitia" class="form-control" value="'. $data['email_panitia'] .'" readonly/>
</div>

<div class="form-group">
    <label> No. Telepon:</label>
    <input type="text" name="no_telp_panitia" class="form-control" value="'. $data['no_telp_panitia'] .'" readonly/>
</div>

<div class="form-group">
    <label> Teks:</label>
    <textarea class="form-control" name="teks" rows="4" readonly/>SAYA SELAKU PANITIA PENGGARAPAN BUKU FOTO ALBUM KENANGAN SEKOLAH MENYETUJUI BEKERJA SAMA DALAM PROSES PEMBUATAN FOTO ALBUM KENANGAN SEKOLAH DENGAN HELLO ARROW CREATIVE INDONESIA DAN TERIKAT DENGAN SYARAT DAN KETENTUAN YANG BERLAKU</textarea>
</div>

<div class="form-group">
    <label>Upload Audio :</label>
    <input type="file" name="file_audio" class="form-control" required>
</div>

<div class="form-group">
    <input type="radio" name="radio" id="yes" value="Setuju"> Saya setuju dengan ketentuan yang berlaku( <a href="term.php" target="frmMain">TERM AND CONDITIONS </a>) <br>
    <input type="radio" name="radio" id="no" value="Tidak Setuju" checked="checked"> Saya tidak setuju<br>
</div>

<div class="form-group">
    <input type="submit" name="submit" value="Kirim" class="btn btn-success" onclick="return fnCheckRadio();" >
    <input type="reset" value="Reset" class="btn btn-danger">
    <a type="button" class="btn btn-info" href="buat_laporan.php">Kembali</a>
</div>

</form>
';
}
?>

<script type="text/javascript">
function fnCheckRadio()
{   
     var radYes=document.getElementById("yes"); 
     if(radYes.checked)
     {              
        return true;
     }
     else
     {
        alert("Silahkan pilih 'Saya setuju dengan ketentuan yang berlaku' ");
        return false;
     }
   return false;
}

</script>


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
?>

function changeValue(id_paket){
    document.getElementById('id_paket').value = prdName[id_paket].id_paket;
    document.getElementById('harga').value = prdName[id_paket].harga;
};
</script>

</main>
</body>
</html>