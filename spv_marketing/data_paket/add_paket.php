<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Produk</title>

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../../admin-login.php?pesan=gagal");
	}
 
	?>

<body>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Paket</h1>
</div>

<form action="upload.php" enctype="multipart/form-data" method="POST">

<div class="form-group">
    <label> Jenis Paket </label> 
    <input type="text" name="jenis_paket" class="form-control" required>
</div>

<div class="form-group">
    <label>Harga</label>
    <input type="text" name="harga" class="form-control" onkeypress="return number(event)" required>
</div>

<div class="form-group">
    <label> Keterangan </label> 
    <textarea class="form-control" name="keterangan" rows="3"></textarea>
</div>

<div class="form-group">
    <label> Upload Gambar</label> 
    <input type="file" name="gambar" class="form-control" required>
</div>

<div class="form-group">
    <input type="submit" value="Tambah" class="btn btn-success">
    <input type="reset" value="Reset" class="btn btn-danger">
    <a type="button" class="btn btn-info" href="produk.php">Kembali</a>
</div>

<!-- Ini JS-->
<script>
		function number(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>

</form>

</main>    
</body>
</html>