<?php

class Library{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=arc_indo','root','');
    }

    public function showSekolah(){
        $sql   = "SELECT * FROM daftar_sekolah";
        $query = $this->db->query($sql);
        return $query;
    }

    
}

?>