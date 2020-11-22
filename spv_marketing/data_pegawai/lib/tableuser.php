<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=arc_indo','root','');
    }
    
    public function editPegawai($id_pgw){
        $sql = "SELECT * FROM pegawai WHERE id_pgw='$id_pgw'";
        $query = $this->db->query($sql);
        return $query;
        }

    public function addPegawai($no_ktp, $nama, $no_telp, $jabatan, $email, $username, $password) {
        $sql    = "INSERT INTO pegawai (no_ktp, nama, no_telp, jabatan, email, username, password) VALUES ('$no_ktp', '$nama', 
        '$no_telp', '$jabatan', '$email', '$username', '$password')";

        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal Input Data";
        }
        else {
            echo '<script language="javascript">alert("Berhasil tambah data!"); document.location="data_pegawai.php"; </script>';
        }
    }

    public function updatePegawai($id_pgw, $no_ktp, $nama, $no_telp, $jabatan, $email, $username, $password){
        $sql   = "UPDATE pegawai SET no_ktp='$no_ktp', nama='$nama', no_telp='$no_telp', jabatan='$jabatan', 
        email='$email', username='$username', password='$password' WHERE id_pgw='$id_pgw'";
        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal edit Data";
        }
        else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_pegawai.php" target="frmMain">';
        }
    }


    public function showPegawai(){
        $sql   = "SELECT * FROM pegawai WHERE jabatan = 'marketing' ORDER BY pegawai.id_pgw ASC";
        $query = $this->db->query($sql);
        return $query;
    }

    public function deletePegawai($id_pgw){
        $sql   = "DELETE FROM pegawai WHERE id_pgw='$id_pgw'";
        $query = $this->db->query($sql); 
    }
    
}

?>