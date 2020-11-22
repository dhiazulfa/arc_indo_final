<?php
// Load file koneksi.php
include "../../connection.php";

// Ambil Data yang Dikirim dari Form
$id_paket      = $_POST['id_paket'];
$jenis_paket   = $_POST['jenis_paket'];
$harga         = $_POST['harga'];
$keterangan    = $_POST['keterangan'];

$gambar        = $_FILES['gambar']['name'];
$tipe          = $_FILES['gambar']['type'];
$tmp_file      = $_FILES['gambar']['tmp_name'];

// Set path folder tempat menyimpan gambarnya
$path = "../../assets/image/".$gambar;

if($tipe == "image/jpg" || $tipe == "image/jpeg"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
	// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :	
      // Proses simpan ke Database
      $query = "UPDATE daftar_paket SET jenis_paket='$jenis_paket', harga='$harga', keterangan='$keterangan', gambar='".$gambar."', tipe='".$tipe."' WHERE id_paket='$id_paket' ";
      $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: produk.php"); // Redirectke halaman index.php
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='gambar.php'>Kembali Ke Form</a>";
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, Gambar gagal untuk diupload.";
      echo "<br><a href='gambar.php'>Kembali Ke Form</a>";
    }
}else{
	// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
	echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
	echo "<br><a href='gambar.php'>Kembali Ke Form</a>";
  }
?>