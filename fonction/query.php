<?php

class myDB{

    // Connection à la BDD (PDO)
    private function bdd() {
        include("connection.php");
        $pdo = new myPDO();
        return $pdo->connect();
    }
    
    // Récupération des Axes
    public function get_axe() {
        $rows = $this->bdd()->query("SELECT * FROM axe");
        return $rows->fetchAll();
    }



    



}

