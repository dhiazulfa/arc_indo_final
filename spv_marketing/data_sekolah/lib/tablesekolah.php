<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=arc_indo','root','');
    }
    
    public function editSekolah($id){
        $sql = "SELECT * FROM daftar_sekolah WHERE id='$id'";
        $query = $this->db->query($sql);
        return $query;
        }

    public function addSekolah($kode_sekolah, $nama_sekolah, $email_sekolah, $telepon, $alamat) {
        $sql    = "INSERT INTO daftar_sekolah (kode_sekolah, nama_sekolah, email_sekolah, telepon, alamat)
        VALUES ('$kode_sekolah', '$nama_sekolah', '$email_sekolah', '$telepon', '$alamat')";

        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal Input Data";
        }
        else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_sekolah.php" target="frmMain">';
        }
    }

    public function updateSekolah($id, $kode_sekolah, $nama_sekolah, $email_sekolah, $telepon, $alamat){
        $sql   = "UPDATE daftar_sekolah SET kode_sekolah='$kode_sekolah', nama_sekolah='$nama_sekolah',
        email_sekolah='$email_sekolah', telepon='$telepon', alamat='$alamat' WHERE id='$id'";
        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal edit Data";
        }
        else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_sekolah.php" target="frmMain">';
        }
    }


    public function showSekolah(){
        $sql   = "SELECT * FROM daftar_sekolah ORDER BY kode_sekolah='YK'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function deleteSekolah($id){
        $sql   = "DELETE FROM daftar_sekolah WHERE id='$id'";
        $query = $this->db->query($sql); 
    }
    
}

?>