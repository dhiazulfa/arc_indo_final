<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../../admin-login.php?pesan=gagal");
	}
 
	?>

<?php

require ('lib/tabletahun.php');
 
if(isset($_GET['id_tahun'])){
$Lib = new Library();
$tahun = $Lib->editTahun($_GET['id_tahun']);
$edit = $tahun->fetch(PDO::FETCH_OBJ);
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
  <h1 class="h2">Edit Tahun Ajaran</h1>
</div>    

      <form action="edit_tahun.php" method="POST" class="form-group">
        ID Tahun : <input type="text" name="id_tahun" value="'.$edit->id_tahun.'" class="form-control" readonly/><br>
        Tahun Ajaran : <input type="text" name="tahun_ajaran" value="'.$edit->tahun_ajaran.'" class="form-control" required><br>
        
        <input type="submit" name="updateTahun" value="Update" class="btn btn-success">
        <input type="reset" value="Reset" class="btn btn-danger">
        <a class= "btn btn-info" href="data_sekolah.php">Kembali</a>
      </form>

</main>
</body>
</html>

';
}

if(isset($_POST['updateTahun'])){

  $id_tahun         = $_POST['id_tahun'];
  $tahun_ajaran     = $_POST['tahun_ajaran'];
   
  $Lib = new Library();
  $upd = $Lib->updateTahun($id_tahun, $tahun_ajaran);
 
}

  
?>