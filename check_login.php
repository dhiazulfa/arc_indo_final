<?php
    session_start();

    include 'connection.php';

    $username       = $_POST['username'];
    $password       = md5($_POST['password']);

    //seleksi data login brow

    $login          = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password' ");

    //hitung jumlah data yang ditemukan

    $check          = mysqli_num_rows($login);

    //cek di database

    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        echo '<script language="javascript">alert("Username atau password salah!"); document.location="https://www.hukumonline.com/klinik/detail/cl5960/landasan-hukum-penanganan-cybercrime-di-indonesia/"; </script>';;
    }

    else if($check>0) {

        $data = mysqli_fetch_assoc($login);
            // buat session login dan username
            $_SESSION['username'] = $username;
            // alihkan ke halaman dashboard admin
            echo '<script language="javascript">alert("Anda berhasil Login!"); document.location="panitia/halaman_panitia.php"; </script>';
     
        // cek jika user login sebagai panitia
        }
        	
        else{
        echo '<script language="javascript">alert("Username atau password salah!"); document.location="login.php"; </script>';
        }
     
    ?>