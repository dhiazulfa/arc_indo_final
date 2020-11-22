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
   //cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location: ../admin-login.php?pesan=gagal");
  }
   
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pricelist</h1>
  </div>

<table class="table table-striped table-sm" cellpadding="8">
<tr>
  <th>ID Buku</th>
  <th>Jenis Buku</th>
  <th>Harga per Lembar</th>
  <th>Keterangan</th>
</tr>

<?php
// Load file koneksi.php
include "../connection.php";

$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                  <td>".$row["id_buku"]."</td> 
                  <td>".$row["jenis_buku"]."</td>
                  <td>".$row["harga"]."</td>
                  "?> <td> <a href="data_buku/data_buku.php?id_buku=$row['id_buku']" >Lihat Selengkapnya</a><td>
                  <?php   
              " </tr>";
    }
} else {
    echo "0 results";
}

?>
</table>

<a class="btn btn-primary" href="hitung.php" target="frmMain"> Hitung Harga Buku </a>


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