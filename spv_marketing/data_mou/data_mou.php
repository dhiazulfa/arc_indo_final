<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/animate.css">
</head>
<body>

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../../admin-login.php?pesan=gagal");
	}
 
	?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kirim MOU</h1>
  </div>

<table class="table table-striped table-sm table-bordered" cellpadding="8">
  <tr>
    <th>No</th>
    <th>Nama Pengirim</th>
    <th>Nama Panitia</th>
    <th>Email Tujuan</th>
    <th>Nomor Proposal</th>
    <th>Nomor MOU</th>
    <th>Tahun Ajaran</th>
    <th>Tanggal</th>
    <th>File</th>
    <th>Tujuan</th>
  </tr>

<?php
// Load file koneksi.php

include "../../connection.php";

$no = 0;

$query = "SELECT proposal_status.id_status, proposal_status.id_proposal, kirim_proposal.id, kirim_proposal.no_proposal,tahun_ajaran.id_tahun, tahun_ajaran.tahun_ajaran, pegawai.id_pgw, pegawai.nama,  users.id_akun, users.nama_panitia, kirim_mou.id_status,
kirim_mou.id_user, kirim_mou.id_pegawai, kirim_mou.id_thn, kirim_mou.no_mou, kirim_mou.tgl_kirim, kirim_mou.email_tujuan, kirim_mou.file_mou, kirim_mou.nama_tujuan 
FROM kirim_mou INNER JOIN users ON kirim_mou.id_user = users.id_akun INNER JOIN pegawai ON kirim_mou.id_pegawai = pegawai.id_pgw
INNER JOIN tahun_ajaran ON kirim_mou.id_thn = tahun_ajaran.id_tahun INNER JOIN proposal_status ON kirim_mou.id_status = proposal_status.id_status INNER JOIN kirim_proposal ON proposal_status.id_proposal = kirim_proposal.id"; // Tampilkan semua data
$sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $no++;

    echo "<tr>";

    echo "<th>".$no."</th>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['nama_panitia']."</td>";
    echo "<td>".$data['email_tujuan']."</td>";
    echo "<td>".$data['no_proposal']."</td>";
    echo "<td>".$data['no_mou']."</td>";
    echo "<td>".$data['tahun_ajaran']."</td>";
    echo "<td>".$data['tgl_kirim']."</td>";
    echo "<td>".$data['file_mou']."</td>";
    echo "<td>".$data['nama_tujuan']."</td>";
    echo "</tr>";
  }
 } else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}

?>
</table>

<br><br>
</main>  

</body>
</html>

