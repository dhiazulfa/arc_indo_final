<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=arc_indo','root','');
    }
    
    public function editTahun($id_tahun){
        $sql = "SELECT * FROM tahun_ajaran WHERE id_tahun='$id_tahun'";
        $query = $this->db->query($sql);
        return $query;
        }

    public function addTahun($tahun_ajaran) {
        $sql    = "INSERT INTO tahun_ajaran (tahun_ajaran) VALUES ('$tahun_ajaran')";

        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal Input Data";
        }
        else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_tahun.php" target="frmMain">';
        }
    }

    public function updateTahun($id_tahun, $tahun_ajaran){
        $sql   = "UPDATE tahun_ajaran SET tahun_ajaran='$tahun_ajaran' WHERE id_tahun='$id_tahun'";
        $query = $this->db->query($sql);

        if(!$query){
            return "Gagal edit Data";
        }
        else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=data_tahun.php" target="frmMain">';
        }
    }


    public function showTahun(){
        $sql   = "SELECT * FROM tahun_ajaran";
        $query = $this->db->query($sql);
        return $query;
    }

    public function deleteTahun($id_tahun){
        $sql   = "DELETE FROM tahun_ajaran WHERE id_tahun='$id_tahun'";
        $query = $this->db->query($sql); 
    }
    
}

?>