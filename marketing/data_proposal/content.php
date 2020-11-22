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
    <h2 style="margin-bottom: 0;">Instagram Kami</h2>
    https://www.instagram.com/helloarrowcreativeindonesia
    <div style="clear: both"></div>
    <hr />
    <div style="text-align: justify">
        <?php echo $pesan; // Tampilkan isi pesan ?>
    </div>
</body>
