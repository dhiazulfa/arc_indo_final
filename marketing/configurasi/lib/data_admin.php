<?php


class Marketing{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=arc_indo','root','');
    }
    

    public function updateProfil($id_pgw, $no_ktp, $nama, $email, $username, $password){
        $sql   = "UPDATE pegawai SET no_ktp='$no_ktp', nama='$nama', email='$email', username='$username', password='$password' WHERE id_pgw='$id_pgw'";
        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal edit Data";
        }
        else {
            echo '<script language="javascript">alert("Profil berhasil diperbarui!"); document.location="../dashboard.php"; </script>';
        }
    }

}

?>