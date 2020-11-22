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
    <h1 class="h2">Laporan Form Persetujuan</h1>
  </div>

<table class="table table-striped table-sm table-bordered" cellpadding="8">
  <tr>
    <th>NISN</th>
    <th>Asal Sekolah</th>
    <th>Nama Panitia</th>
    <th>Email</th>
    <th>Tahun Ajaran</th>
    <th>No. Telepon</th>  
    <th>Jenis Paket</th>  
    <th>Rekaman</th>
    <th>Download</th>

  </tr>

<?php
// Load file koneksi.php

include "../connection.php";

$query = "SELECT tahun_ajaran.id_tahun, tahun_ajaran.tahun_ajaran, daftar_paket.id_paket, daftar_paket.jenis_paket, daftar_sekolah.id, daftar_sekolah.nama_sekolah, laporan.file_audio, users.nisn, laporan.id_user, users.id_sekolah, users.id_thn, users.nama_panitia, users.email_panitia,
users.no_telp_panitia FROM users INNER JOIN laporan ON laporan.id_user=users.id_akun INNER JOIN daftar_sekolah ON users.id_sekolah = daftar_sekolah.id INNER JOIN daftar_paket ON laporan.id_paket = daftar_paket.id_paket 
INNER JOIN tahun_ajaran ON users.id_thn = tahun_ajaran.id_tahun"; // Tampilkan semua data gambar
$sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

if($row >= 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$data['nisn']."</td>";
    echo "<td>".$data['nama_sekolah']."</td>";
    echo "<td>".$data['nama_panitia']."</td>";
    echo "<td>".$data['email_panitia']."</td>";
    echo "<td>".$data['tahun_ajaran']."</td>";
    echo "<td>".$data['no_telp_panitia']."</td>";
    echo "<td>".$data['jenis_paket']."</td>";
    echo "<td><audio controls> <source src='../assets/laporan/".$data['file_audio']."' type='audio/mp3'> 
    </audio></td>";
    echo "<td>
    <a href='../assets/image/laporan/".$data['file_audio']."'> MP3 </a>
    </td>";
    echo "</tr>";
  }
 } else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Tidak ada DATA</td></tr>";
}

?>
</table>

<br><br>

</main>
<!-- end of sidebar -->


<!-- This Is JS -->
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