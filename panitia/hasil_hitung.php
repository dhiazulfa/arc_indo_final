<!DOCTYPE html>
<html lang="en">
<head>
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
   //cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location: ../../login.php?pesan=gagal");
  }
   
?>
    
<?php

$harga        = $_POST['harga'];
$cashback     = $_POST['cashback'];
$jumlah_siswa = $_POST['jumlah_siswa'];

$total        = number_format( (int) ($harga * 120) + ($jumlah_siswa / $cashback * 120));

    if(empty($harga or $cashback or $jumlah_siswa)){
        echo "Inputkan Jumlah";
    } else{
        
        echo "
        <main role='main' class='col-md-9 ml-sm-auto col-lg-10 px-4'>
        <div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
            <h1 class='h2'>Hitung Harga</h1>
        </div>
        
        <div class='form-group'>
        <label>Total harga per siswa</label>
        <input disabled type='int' class='form-control' name='total' id='total' value='Rp. $total,00'/>      
        </div>

        <p> Harga tersebut masih bisa didiskusikan dengan marketing kami melalui daring ataupun langsung </p>

        <div class='form-group'>
            <a class='btn btn-danger' href='hitung.php'> Kembali </a>
        </div>

        </main>";
}
?>

</body>
</html>