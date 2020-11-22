<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Laporan</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/animate.css">
</head>
<body>

<?php 
session_start();
   //cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['username']==""){
    header("location: ../../login.php?pesan=gagal");
  }
   
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Form Persetujuan</h3>
  </div>

<?php

include "../../connection.php";

$username=$_SESSION['username'];

$q = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

while ($data = mysqli_fetch_array($q)){
echo '

<form action="status.php" method="POST"> 

    <div class="form-group">
        <p> <b> Apakah anda yakin ingin bekerja sama dengan kami? Jika iya, silahkan PILIH NOMOR PROPOSAL sesuai dengan yang dikirim oleh tim marketing kami dan silahkan pilih "Saya Setuju" untuk melanjutkan mengisi form persetujuan kerjasama selanjutnya. </b> </p>
    </div>

    <div class="form-group" hidden>
        <label> ID User:</label>
        <input type="text" name="id_user" class="form-control" value="'. $data['id_akun'] .'" readonly/>
    </div> ' ?>

<select name="proposal1" id="proposal1" class="form-control col-sm-6" onchange='changeValue(this.value)' required>
  
<option value="">--- Pilih Nomor Proposal sesuai dengan proposal yang dikirim ---</option>

 <?php
 
 include "../../connection.php";
 
 $query     = mysqli_query($conn, "SELECT * FROM kirim_proposal order by id ASC"); 
 $result    = mysqli_query($conn, "SELECT * FROM kirim_proposal");  
 $jsArray   = "var prdName = new Array();\n";
     while ($row = mysqli_fetch_array($result)) {  
     echo '<option name="id1"  value="' . $row['id'] . '">' . $row['no_proposal'] . '</option>';  
         $jsArray .= "prdName['" . $row['id'] . "'] = {id_proposal:'" . addslashes($row['id']) ."'};\n";
    }

?>

</select>


<div class="form-group" hidden>
    <label> ID Proposal:</label>
    <input type="text" name="id_proposal" id="id_proposal" class="form-control" required>
</div>

<?php
    echo '
    <br>

    <div class="form-group">
        <input type="radio" name="radio" id="yes" value="Setuju"> Setuju </a> <br>
        <input type="radio" name="radio" id="no" value="Tidak Setuju" checked="checked"> Tidak setuju<br>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Kirim" class="btn btn-success" onclick="return fnCheckRadio();" >
        <a type="button" class="btn btn-info" href="buat_laporan.php">Kembali</a>
    </div>

</form>

';

}

?>

<script type="text/javascript">
function fnCheckRadio()
{   
     var radYes=document.getElementById("yes"); 
     if(radYes.checked)
     {              
        return true;
     }
     else
     {
        alert("Silahkan pilih 'Saya setuju' jika ingin mengisi form selanjutnya ");
        return false;
     }
   return false;
}

</script>

<script type="text/javascript"> 

<?php
    echo $jsArray;
?>

function changeValue(id){
    document.getElementById('id_proposal').value = prdName[id].id_proposal;
};
</script>

</main>

<!-- This Is JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../../assets/js/myjs.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

</body>
</html>