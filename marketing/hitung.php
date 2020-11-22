<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/animate.css">

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
    <h1 class="h2">Hitung Harga</h1>
  </div>

<form method="post" action="hasil_hitung.php">

<label>ID Paket</label>
<select name="id_paket" id="id_paket" class="form-control" onchange='changeValue(this.value)' required>
  
  <option value="">-Pilih-</option>

 <?php
 
 include "../connection.php";
 
$query     = mysqli_query($conn, "SELECT * FROM daftar_paket order by id_paket ASC"); 
$result    = mysqli_query($conn, "SELECT * FROM daftar_paket");  
$jsArray   = "var prdName = new Array();\n";
    while ($row = mysqli_fetch_array($result)) {  
    echo '<option name="id_paket"  value="' . $row['id_paket'] . '">' . $row['jenis_paket'] . '</option>';  
        $jsArray .= "prdName['" . $row['id_paket'] . "'] = { harga:'".addslashes($row['harga'])."'};\n";
   }

?>

</select>

<div class="form-group">
    <label>Harga per Lembar</label>
    <input class="form-control" name="harga" id="harga" readonly/>      
</div>

<div class="form-group">
    <label>Jumlah lembar</label>
    <input class="form-control" name="jumlah_lembar" id="jumlah_lembar" value="120 Lembar" readonly/>      
</div>

<div class="form-group">
    <label>Jumlah Siswa</label>
    <input class="form-control" onkeypress="return number(event)" name="jumlah_siswa" id="jumlah_siswa" required>      
</div>

<div class="form-group">
    <label>Cashback</label>
    <input class="form-control" onkeypress="return number(event)" name="cashback" id="cashback" required>      
</div>


<!-- Ini JSnya -->
<script type="text/javascript"> 

<?php
    echo $jsArray;
?>

function changeValue(id_paket){
    document.getElementById('harga').value = prdName[id_paket].harga;
};

function number(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
		  return true;
		}
    
</script>

<div class="form-grup">
   <input type="submit" class="btn btn-primary" name="hitung" value="Harga Buku" target="frmMain">
</div>



</form>
</main>


</body>
</html>