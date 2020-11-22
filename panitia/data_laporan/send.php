<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
// Load file koneksi.php
include "../../connection.php";
// Ambil Data yang Dikirim dari Form

$id_akun      = $_POST['id_akun'];
$id_paket     = $_POST['id_paket'];
$teks         = $_POST['teks'];
$status       = $_POST['radio'];
$file_audio   = $_FILES['file_audio']['name'];
$tipe         = $_FILES['file_audio']['type'];
$tmp_file     = $_FILES['file_audio']['tmp_name'];


// Set path folder tempat menyimpan gambarnya
$path = "../../assets/laporan/".$file_audio;



if($tipe == 'audio/mpeg' || $tipe == 'audio/mp3' ){ // Cek apakah tipe file yang diupload adalah JPG / JPEG
	// Jika tipe file yang diupload JPG / JPEG / lakukan :
    // Proses upload
    $cek_laporan    = mysqli_query($conn,"SELECT id_user FROM laporan WHERE id_user='$id_akun' ");
    $check          = mysqli_num_rows($cek_laporan);

    if($check>0){
    echo '<script language="javascript">alert("Maaf anda sudah kirim laporan!"); document.location="../dashboard.php"; </script>';
    }

else{ 

    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :	
      // Proses simpan ke Database
      $query = "INSERT INTO laporan(id_user, id_paket, teks, file_audio, tipe) VALUES
      ( '$id_akun', '$id_paket', '$teks', '".$file_audio."', '".$tipe."')";
      $result = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($query){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        echo '<script language="javascript">alert("Laporan berhasil dikirim! Untuk selanjutnya pihak kami akan mengirimkan MOU ke email anda untuk dipelajari terlebih dahulu."); document.location="../halaman_panitia.php"; </script>';
      }else{
        //Jika gagal kirim
        echo '<script language="javascript">alert("Maaf laporan gagal dikirim!"); document.location="form_laporan.php"; </script>';
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo '<script language="javascript">alert("Maaf audio gagal upload! Coba lagi"); document.location="form_laporan.php"; </script>';
    }
}
  }else{
	// Jika tipe file yang diupload bukan JPG / JPEG lakukan :
    echo '<script language="javascript">alert("Maaf tipe audio harus MP3! Coba lagi"); document.location="form_laporan.php"; </script>';
  }
?>
</body>
</html>