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

<form action="update.php" enctype="multipart/form-data" method="POST">

<table class="table table-striped table-sm" cellpadding="8">

<?php

include "../../connection.php";

$id_paket = $_GET['id_paket'];

$sql = mysqli_query($conn, "SELECT * FROM daftar_paket WHERE id_paket='$id_paket' ");
$row = mysqli_num_rows($sql);

if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
  while($data = mysqli_fetch_array($sql)){
    ?> 
<tr>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h3>Paket <?php echo $data['jenis_paket']; ?></h3>
    </div>
</tr>

<tr>
    <td>ID Paket</td>
    <td> <?php echo $data['id_paket']; ?> </td>
    <input type="hidden" name="id_paket" value="<?php echo $data['id_paket']; ?>">
</tr>

<tr>
    <td>Jenis Paket</td>
    <td> <input type="text" name="jenis_paket" class="form-control" value="<?php echo $data['jenis_paket']; ?>" required> </td>
</tr>

<tr>
    <td>Harga</td>
    <td> <input type="text" name="harga" class="form-control" onkeypress="return number(event)" value="<?php echo $data['harga']; ?>" required> </td>
</tr>

<tr>
    <td>Keterangan</td>
    <td> <textarea class="form-control" name="keterangan" rows="10" required> <?php echo $data['keterangan']; ?> </textarea></td>
</tr>

<tr>
    <td>Gambar</td>
    <td><input type="file" name="gambar" required></td>
</tr>

<?php

  }

} else{ // Jika data tidak ada

  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";

}

?>
</table>

<input type="submit" value="Edit" class="btn btn-success">
<input type="reset" value="Reset" class="btn btn-danger">

<a type="button" class="btn btn-info" href="produk.php">Kembali</a>

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

</form>
</main>
</body>
</html>