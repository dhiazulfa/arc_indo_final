<?php

include '../../connection.php';

$id_paket    = $_GET['id_paket'];

mysqli_query($conn, "DELETE FROM daftar_paket WHERE id_paket='$id_paket' ");

header("location: produk.php");

?>