<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/animate.css">

</head>
<body>

<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['jabatan']==""){
		header("location:../admin-login.php?pesan=gagal");
	}
 
	?>

<!-- Navbar -->
<nav class="navbar navbar-expand fixed-top navbar-dark bg-dark flex-md-nowrap p-0 shadow navbar-expand-lg">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
    Admin Page
  </a>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link dropdown-toggle" href="#" id="profil" role="button" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <img src="../assets/images/admin/admin.png" width="30" height="30" class="rounded-circle" alt="">
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profil">
        <a class="dropdown-item" href="configurasi/profil.php" target="frmMain">Profile</a>
        <a class="dropdown-item" href="../logout.php">Logout</a>
      </div>

    </li>
  </ul>
</nav>
<!-- End of Navbar-->

<!-- Menu Sidebar -->

<div class="container-fluid">
      <div class="row">

        <nav class="col-md-2 col-sm-6 d-none d-md-block d-sm-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              
              <li class="nav-item">
                <a class="nav-link active" href="dashboard.php" target="frmMain">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="hitung.php" target="frmMain">
                  <span data-feather="file"></span>
                  Price List
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="proposal_acc.php" target="frmMain">
                  <span data-feather="check"></span>
                  Proposal Lolos
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="data_paket/produk.php" target="frmMain">
                  <span data-feather="shopping-cart"></span>
                  Data Paket
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="data_user/data_user.php" target="frmMain">
                  <span data-feather="users"></span>
                  Data Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="data_sekolah/data_sekolah.php" target="frmMain">
                  <span data-feather="box"></span>
                  Data Sekolah
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="data_mou/data_mou.php" target="frmMain">
                  <span data-feather="book"></span>
                  Data Mou
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="data_mou/send_mail.php" target="frmMain">
                  <span data-feather="mail"></span>
                  Kirim Mou
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="report.php" target="frmMain">
                  <span data-feather="bar-chart-2"></span>
                  Laporan Form Persetujuan
                </a>
              </li>
              
            </ul>

          </div>
        </nav>

      </div>

      <div class="embed-responsive embed-responsive-16by9">
          <iframe name="frmMain" class="embed-responsive-item" src="dashboard.php" scrolling="auto"></iframe>
      </div>

  </div>
<!-- end of sidebar -->


<!-- This Is JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../assets/js/myjs.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

</body>
</html>