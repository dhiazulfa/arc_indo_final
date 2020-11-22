<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=arc_indo','root','');
    }
    
    public function editUser($id_akun){
        $sql = "SELECT * FROM users WHERE id_akun='$id_akun'";
        $query = $this->db->query($sql);
        return $query;
        }

    public function addUser($id_sekolah, $id_thn, $nisn, $nama_panitia, $email_panitia, $no_telp_panitia,
     $username, $password) {
        $sql    = "INSERT INTO users (id_sekolah, id_thn, nisn, nama_panitia, email_panitia,
        no_telp_panitia, username, password) VALUES ( '$id_sekolah', '$id_thn', '$nisn', '$nama_panitia', 
        '$email_panitia', '$no_telp_panitia', '$username', '$password')";

        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal Input Data";
        }
        else {
            echo '<script language="javascript">alert("Berhasil tambah data!"); document.location="data_user.php"; </script>';
        }
    }

    public function updateUser($id_akun, $nisn, $nama_panitia, $email_panitia, $no_telp_panitia, $username, $password){
        $sql   = "UPDATE users SET nisn='$nisn', nama_panitia='$nama_panitia', email_panitia='$email_panitia', 
        no_telp_panitia='$no_telp_panitia', username='$username', password='$password' WHERE id_akun='$id_akun'";
        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal edit Data";
        }
        else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_user.php" target="frmMain">';
        }
    }


    public function showUser(){
        $sql   = "SELECT tahun_ajaran.id_tahun, tahun_ajaran.tahun_ajaran, users.id_akun, users.id_sekolah, users.id_thn, daftar_sekolah.id, daftar_sekolah.nama_sekolah, daftar_sekolah.email_sekolah, users.nisn, 
        users.nama_panitia, users.email_panitia, users.no_telp_panitia, users.username 
        FROM users INNER JOIN daftar_sekolah ON users.id_sekolah = daftar_sekolah.id
        INNER JOIN tahun_ajaran ON users.id_thn = tahun_ajaran.id_tahun 
        ORDER BY users.id_akun ASC";
        $query = $this->db->query($sql);
        return $query;
    }

    public function deleteUser($id_akun){
        $sql   = "DELETE FROM users WHERE id_akun='$id_akun'";
        $query = $this->db->query($sql); 
    }
    
}

?>