<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=arc_indo','root','');
    }

    public function updateProfil($id_akun, $nisn, $nama_panitia, $email_panitia, $no_telp_panitia, $username){
        $sql   = "UPDATE users SET nisn='$nisn', nama_panitia='$nama_panitia', email_panitia='$email_panitia',
        no_telp_panitia='$no_telp_panitia', username='$username' WHERE id_akun='$id_akun' ";
        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal edit Data";
        }
        else {
            echo '<script language="javascript">alert("Profil berhasil diperbarui!"); document.location="../dashboard.php"; </script>';
        }
    }


    public function showUser(){
        $sql   = "SELECT * FROM users WHERE id_akun='$id_akun' ";
        $query = $this->db->query($sql);
        return $query;
    }
    
}

?>