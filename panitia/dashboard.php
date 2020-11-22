<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users Page</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/animate.css">

</head>
<body>

<?php 
session_start();
   //cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location: ../login.php?pesan=gagal");
  }
   
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Hello Arrow Creative Indonesia</h3>
  </div>

  <img src='../assets/images/arc.jpg' width='200' height='200'>

<br><br>

<p> <b> Jika anda baru pertama kali masuk disini, silahkan edit profile anda terlebih dahulu dengan klik <a href="configurasi/profile.php">di sini </a> </b> </p>

<p> <b> Informasi password user ada di dalam proposal, untuk menjaga keamanan data kami tidak memperbolehkan mengedit password.</b> </p>

<p> <b> Terima kasih atas pengertiannya.</b> </p>

<p>Kami adalah sebuah perusahaan yang bergerak dibidang foto album kenangan sekolah yang berlokasi di <b> Yogyakarta. </b></p>

<p>Perusahaan kami berdiri pada tahun 2012 dan sudah menangani pembuatan foto album kenangan dengan banyak sekolah baik di Yogyakarta maupun luar daerah.</p>

<p>Berikut produk yang kami tawarkan: </p>

<table class="table table-striped table-sm table-bordered" cellpadding="8">
<tr>
  <th>Nomor</th>
  <th>Jenis Buku</th>
</tr>

<?php
// Load file koneksi.php
include "../connection.php";

$sql = "SELECT * FROM daftar_paket";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                  <td>".$row["id_paket"]."</td> 
                  <td>".$row["jenis_paket"]."</td>
               </tr>";
    }
} else {
    echo "0 results";
}

?>
</table>

<p> Klik <a href="data_paket/produk.php">di sini </a> untuk lebih lengkap</p>

<p &nbsp>
  <a class="btn btn-primary" href="data_laporan/buat_laporan.php" target="frmMain"> Tertarik dengan kami? </a>
</p>
</main>

<!-- Ini JS nya-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../assets/js/myjs.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
</script>

</body>
</html>