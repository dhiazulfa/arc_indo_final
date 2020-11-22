<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arc_indo";

// ini buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
// cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>