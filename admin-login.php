<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="animate.css">
    
    <title>Login</title>

</head>
<body>



<center>
<div class="container mt-5">
<div class="kotak_login">
<div class="outter-form-login">
    <div class="col-md-4 col-md-offset-4 form-login">

<form action="admin-check.php" class="inner-login" method="post">
    <h2 class="text-center tittle-login mb-4"> Admin Login Page </h2>
<br>
    <div class="form-grup">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
    </div>
<br>
    <div class="form-grup">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>

    <br>
    <input type="submit" class="btn btn-primary" value="Login">
    <input type="reset" class="btn btn-danger" value="Reset">

</form>

    </div>

</div>
</div>

<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>

</div>

</center>
</body>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</html>