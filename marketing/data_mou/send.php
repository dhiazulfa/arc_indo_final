<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
</head>
<body>

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../../admin-login.php?pesan=gagal");
	}
 
	?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include ('lib/phpmailer/Exception.php');
include ('lib/phpmailer/PHPMailer.php');
include ('lib/phpmailer/SMTP.php');

include '../../connection.php';

$id_status       = $_POST['id_status'];
$id_user       = $_POST['id_akun'];
$id_pegawai    = $_POST['id_pegawai'];
$id_thn        = $_POST['id_thn'];
$no_mou        = $_POST['no_mou'];
$tgl_kirim     = date('Y-m-d');
$subjek        = $_POST['subjek'];
$nama_tujuan   = $_POST['nama_tujuan'];
$email_tujuan  = $_POST['email_tujuan'];
$pesan         = $_POST['pesan'];

$file_mou          = $_FILES['file_mou']['name'];
$tipe              = $_FILES['file_mou']['type'];
$tmp_file          = $_FILES['file_mou']['tmp_name'];

$path              = "mou/".$file_mou;

$email_pengirim = 'dhiazulfamb@gmail.com';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'apvghtstjljqqlep'; // Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';

// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_tujuan, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
// Load file content.php

ob_start();
include "content.php";
$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();
$mail->Subject = $subjek;
$mail->Body = $content;
//$mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email



if($tipe == "application/pdf"){ // Cek apakah tipe file yang diupload adalah PDF

    if(empty($file_mou)){ // Jika tanpa attachment
        $send = $mail->send();
        if($send){ // Jika Email berhasil dikirim
            header("location: data_mou.php");
        }else{ // Jika Email gagal dikirim
            echo "<h1>Email gagal dikirim</h1><br /><a href='send_mail.php'>Kembali ke Form</a>";
            // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
        }
    }else{ // Jika dengan attachment
    
        $tmp_file          = $_FILES['file_mou']['tmp_name'];
        $tipe              = $_FILES['file_mou']['type'];
    
        
            $mail->addAttachment($tmp_file, $file_mou); // Add file yang akan di kirim
            $send = $mail->send();
            if($send){ // Jika Email berhasil dikirim
                header("location: data_mou.php");
            }else{ // Jika Email gagal dikirim
                echo "<h1>Email gagal dikirim</h1><br /><a href='send_mail.php'>Kembali ke Form</a>";
                // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
            }
    }

    if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
      // Jika gambar berhasil diupload, Lakukan :	
      // Proses simpan ke Database
      $query = "INSERT INTO kirim_mou(id_status, id_user, id_pegawai, id_thn, no_mou, tgl_kirim, subjek, nama_tujuan, email_tujuan, pesan, file_mou, tipe)
      VALUES('$id_status', '$id_user', '$id_pegawai', '$id_thn', '$no_mou', '$tgl_kirim', '$subjek', '$nama_tujuan', '$email_tujuan', '$pesan', '".$file_mou."', '".$tipe."')";
      
      $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: data_mou.php");
      }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='send_mail.php'>Kembali Ke Form</a>";
      }
    }else{
      // Jika gambar gagal diupload, Lakukan :
      echo "Maaf, file gagal untuk diupload.";
      echo "<br><a href='send_mail.php'>Kembali Ke Form</a>";
    }
}else{
	echo "Maaf, Tipe file yang diupload harus PDF";
	echo "<br><a href='send_mail.php'>Kembali Ke Form</a>";
}

?>

</body>
</html>