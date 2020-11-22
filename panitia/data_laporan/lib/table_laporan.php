<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=arc_indo','root','');
    }

    public function addLaporan($no_ktp, $nama, $email, $username, $password, $hak_akses) {
        $sql    = "INSERT INTO user (no_ktp, nama, email, username, password, hak_akses) VALUES ('$no_ktp', '$nama', '$email', '$username', '$password', '$hak_akses')";
        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal Input Data";
        }
        else {
            return "Berhasil Input Data";
        }
    }

    public function updateUser($id_user, $no_ktp, $nama, $email, $username){
        $sql   = "UPDATE user SET no_ktp='$no_ktp', nama='$nama', email='$email', username='$username' WHERE id_user='$id_user'";
        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal edit Data";
        }
        else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_user.php" target="frmMain">';
        }
    }


    public function showUser(){
        $sql   = "SELECT * FROM user WHERE hak_akses='panitia' ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function deleteUser($id_user){
        $sql   = "DELETE FROM user WHERE id_user='$id_user'";
        $query = $this->db->query($sql); 
    }
    
}

?>