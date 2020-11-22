<?php
        include "../../connection.php";
    
        $id_user       = $_POST['id_user'];
        $id_proposal   = $_POST['id_proposal'];
        $status        = $_POST['radio'];

    $cek_laporan    = mysqli_query($conn,"SELECT id_user FROM proposal_status WHERE id_user='$id_user' ");
    $check          = mysqli_num_rows($cek_laporan);

    if($check>0){
        echo '<script language="javascript"> document.location="form_laporan.php"; </script>';
    }

    else {
        
        $insert = "INSERT INTO proposal_status (id_user, id_proposal, status) VALUES ('$id_user', 
        '$id_proposal', '$status')";
        $result = mysqli_query($conn, $insert);

        if($result) {

                ?>
                <script language="javascript">alert("Terima kasih untuk menyetujui bekerjasama dengan kami, selanjutnya silahkan isi form berikut."); 
                document.location="form_laporan.php"; </script>
            <?php
            } 

            else {
                echo "<b>Oops!</b> 404 Error Server.";
            }
        }
?>