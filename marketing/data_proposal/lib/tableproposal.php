<?php

class proposal{

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=arc_indo','root','');
    }

    public function tampilProposal(){
        $sql   = "SELECT * FROM proposal";
        $query = $this->db->query($sql);
        return $query;
    }

}
?>