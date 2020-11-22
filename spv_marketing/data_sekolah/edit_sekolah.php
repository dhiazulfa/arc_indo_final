<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../../admin-login.php?pesan=gagal");
	}
 
	?>

<?php

require ('lib/tablesekolah.php');
 
if(isset($_GET['id'])){
$Lib = new Library();
$user = $Lib->editSekolah($_GET['id']);
$edit = $user->fetch(PDO::FETCH_OBJ);
echo '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/animate.css">
</head>
<body>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data Sekolah</h1>
</div>    

      <form action="edit_sekolah.php" method="POST" class="form-group">
        ID Sekolah : <input type="text" name="id" value="'.$edit->id.'" class="form-control" readonly/><br>
        Kode Sekolah : <input type="text" name="kode_sekolah" value="'.$edit->kode_sekolah.'" class="form-control" required><br>
        Nama Sekolah : <input type="text" name="nama_sekolah" value="'.$edit->nama_sekolah.'" class="form-control" required><br>
        Email Sekolah : <input type="text" name="email_sekolah" value="'.$edit->email_sekolah.'" class="form-control" required><br>
        No. Telpon : <input type="text" name="telepon" value="'.$edit->telepon.'" class="form-control" required><br>
        Alamat     : <input type="text" name="alamat" value="'.$edit->alamat.'" class="form-control" required><br><br>

        <input type="submit" name="updateSekolah" value="Update" class="btn btn-success">
        <input type="reset" value="Reset" class="btn btn-danger">
        <a class= "btn btn-info" href="data_sekolah.php">Kembali</a>

      </form>

</main>
</body>
</html>

';
}

if(isset($_POST['updateSekolah'])){

  $id               = $_POST['id'];
  $kode_sekolah     = $_POST['kode_sekolah'];
  $nama_sekolah     = $_POST['nama_sekolah'];
  $email_sekolah    = $_POST['email_sekolah'];
  $telepon          = $_POST['telepon'];
  $alamat           = $_POST['alamat'];
   
  $Lib = new Library();
  $upd = $Lib->updateSekolah($id, $kode_sekolah, $nama_sekolah, $email_sekolah, $telepon, $alamat);
 
}

  
?>