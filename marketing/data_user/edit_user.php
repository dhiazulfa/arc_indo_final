<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../../admin-login.php?pesan=gagal");
	}
 
?>

<?php

require ('lib/tableuser.php');
 
if(isset($_GET['id_akun'])){
$Lib = new Library();
$user = $Lib->editUser($_GET['id_akun']);
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
  <h1 class="h2">Edit Data User</h1>
</div>    

      <form action="edit_user.php" method="POST" class="form-group">
        ID User : <input type="text" name="id_akun" value="'.$edit->id_akun.'" class="form-control" readonly/><br>
        NISN : <input type="text" name="nisn" value="'.$edit->nisn.'" class="form-control" required><br>
        Nama Panitia : <input type="text" name="nama_panitia" value="'.$edit->nama_panitia.'" class="form-control" required><br>
        Email Panitia : <input type="text" name="email_panitia" value="'.$edit->email_panitia.'" class="form-control" required><br>
        No. Telpon : <input type="text" name="no_telp_panitia" value="'.$edit->no_telp_panitia.'" class="form-control" required><br>
        Username : <input type="text" name="username" value="'.$edit->username.'" class="form-control" required><br>
        Password : <input type="text" name="password" value="'.$edit->password.'" class="form-control" required><br>
       
        <input type="submit" name="updateUser" value="Update" class="btn btn-info">
      </form>

</main>
</body>
</html>

';
}

if(isset($_POST['updateUser'])){

  $id_akun          = $_POST['id_akun'];
  $nisn             = $_POST['nisn'];
  $nama_panitia     = $_POST['nama_panitia'];
  $email_panitia    = $_POST['email_panitia'];
  $no_telp_panitia  = $_POST['no_telp_panitia'];
  $username         = $_POST['username'];
  $password         = md5($_POST['password']);
   
  $Lib = new Library();
  $upd = $Lib->updateUser($id_akun, $nisn, $nama_panitia, $email_panitia, $no_telp_panitia, $username, $password);
 
}

  
?>