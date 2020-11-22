<?php 
session_start();
   //cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location: ../../admin-login.php?pesan=gagal");
  }
?>

<?php

require ('lib/tablebuku.php');
 
if(isset($_GET['id_buku'])){
$Lib = new Library();
$buku = $Lib->editBuku($_GET['id_buku']);
$show = $buku->fetch(PDO::FETCH_OBJ);

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
  <h1 class="h2">Edit Data User</h1>
</div>    

        ID User : <input type="text" name="id_buku" value="'.$show->id_buku.'" class="form-control" readonly/><br>
        No KTP : <input type="text" name="jenis_buku" value="'.$show->jenis_buku.'" class="form-control" required><br>
        Nama : <input type="text" name="harga" value="'.$show->harga.'" class="form-control" required><br>
        Email : <input type="text" name="keterangan" value="'.$show->keterangan.'" class="form-control" required><br>

        <input type="submit" name="updateUser" value="Update" class="btn btn-info">

</main>
</body>
</html>

';

}
  
?>