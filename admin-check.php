<?php
    session_start();

    include 'connection.php';

    $username       = $_POST['username'];
    $password       = md5($_POST['password']);

    //seleksi data login brow

    $login          = mysqli_query($conn,"SELECT * FROM pegawai WHERE username='$username' AND password='$password' ");

    //hitung jumlah data yang ditemukan

    $check          = mysqli_num_rows($login);

    //cek di database

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        echo '<script language="javascript">alert("Username atau password salah!"); document.location="https://www.hukumonline.com/klinik/detail/cl5960/landasan-hukum-penanganan-cybercrime-di-indonesia/"; </script>';;
    }

    else if($check>0) {

        $data = mysqli_fetch_assoc($login);
            // buat session login dan username
        	if($data['jabatan']=="spv"){
 
                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['jabatan'] = "spv";

                echo '<script language="javascript">alert("Anda berhasil Login!"); document.location="spv_marketing/index.php"; </script>';
         
            // cek jika user login sebagai pegawai
            }else if($data['jabatan']=="marketing"){
                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['jabatan'] = "marketing";

                echo '<script language="javascript">alert("Anda berhasil Login Marketing!"); document.location="marketing/index.php"; </script>';
            }
        }	
        else{
        echo '<script language="javascript">alert("Username atau password salah!"); document.location="admin-login.php"; </script>';
        }
?>