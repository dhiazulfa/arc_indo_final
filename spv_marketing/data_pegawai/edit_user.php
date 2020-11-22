<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../../admin-login.php?pesan=gagal");
	}
 
?>

<?php

require ('lib/tableuser.php');
 
if(isset($_GET['id_pgw'])){
$Lib = new Library();
$user = $Lib->editPegawai($_GET['id_pgw']);
$edit = $user->fetch(PDO::FETCH_OBJ);
echo '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/animate.css">
</head>
<body>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data Pegawai</h1>
</div>    

      <form action="edit_user.php" method="POST" class="form-group">
        ID Pegawai : <input type="text" name="id_pgw" value="'.$edit->id_pgw.'" class="form-control" readonly/><br>
        No. KTP : <input type="text" name="no_ktp" value="'.$edit->no_ktp.'" class="form-control" required><br>
        Nama : <input type="text" name="nama" value="'.$edit->nama.'" class="form-control" required><br>
        No. Telepon : <input type="text" name="no_telp" value="'.$edit->no_telp.'" class="form-control" required><br>
        Jabatan : <input type="text" name="jabatan" value="'.$edit->jabatan.'" class="form-control" required><br>
        Email : <input type="text" name="email" value="'.$edit->email.'" class="form-control" required><br>
        Username : <input type="text" name="username" value="'.$edit->username.'" class="form-control" required><br>
        Password : <input type="text" name="password" value="'.$edit->password.'" class="form-control" required><br>
       
        <input type="submit" name="updatePegawai" value="Update" class="btn btn-info">
      </form>

</main>
</body>
</html>

';
}

if(isset($_POST['updatePegawai'])){

  $id_pgw   = $_POST['id_pgw'];
  $no_ktp   = $_POST['no_ktp'];
  $nama     = $_POST['nama'];
  $no_telp  = $_POST['no_telp'];
  $jabatan  = $_POST['jabatan'];
  $email    = $_POST['email'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
   
  $Lib = new Library();
  $upd = $Lib->updatePegawai($id_pgw, $no_ktp, $nama, $no_telp, $jabatan, $email, $username, $password);
 
}

  
?>