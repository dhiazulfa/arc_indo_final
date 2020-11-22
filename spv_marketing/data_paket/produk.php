<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Yang tersedia</title>

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
    <h1 class="h2">Produk</h1>
</div>

<table class="table table-striped table-sm table-bordered"  cellpadding="8">
<tr>
  <th>Nomor</th>
  <th>Jenis Buku</th>
  <th>Harga per Lembar </th>
  <th>Keterangan</th>
  <th>Pilihan</th>
</tr>

<?php
// Load file koneksi.php
include "../../connection.php";

$no    = 1;

$sql = mysqli_query($conn, "SELECT * FROM daftar_paket"); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
  while($data = mysqli_fetch_array($sql)){
    ?>
    <tr>
    <th> <?php echo $no++; ?> </th>
    <td> <?php echo $data['jenis_paket']; ?> </td>
    <td> <?php echo $data['harga']; ?> </td>
    <td> <a href="data_satuan.php?id_paket=<?php echo $data['id_paket']; ?>">Lihat Selengkapnya</a> </td>
    <td>
			<a type="button" class="btn btn-info" href="edit.php?id_paket=<?php echo $data['id_paket']; ?>">EDIT</a>
			<a type="button" class="btn btn-danger" href="delete.php?id_paket=<?php echo $data['id_paket']; ?>">HAPUS</a>
		</td>
    <!--
    echo "<td><img src='image/".$data['nama_img']."' width='100' height='100'></td>";
    -->
    
    </tr>

<?php

  }

} else{ // Jika data tidak ada

  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";

}

?>
</table>

<a type="button" class="btn btn-success" href="add_paket.php">Tambah Paket</a>

<!-- Ini OOP nya -->

<!-- Ini JS nya-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../../assets/js/myjs.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
</script>

</main>
</body>
</html>