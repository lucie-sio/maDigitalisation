<?php

class myDB{

    // Connection à la BDD (PDO)
    private function bdd() {
        include_once("connection.php");
        $pdo = new myPDO();
        return $pdo->connect();
    }
    
    // Récupération des Axes
    public function get_axes() {
        $data = $this->bdd()->query("SELECT * FROM axe");
        return $data->fetchAll();
    }

    // Récupération d'un Axe
    public function get_axe($id) {
        $data = $this->bdd()->query("SELECT * FROM axe WHERE id = ".$id);
        return $data->fetch();
    }

    // Récupération de toutes les entreprises enregistrées
    public function get_companies() {
        $data = $this->bdd()->query("SELECT * FROM company");
        return $data->fetchAll();
    }

    // Récupération d'une entreprise
    public function get_company($id) {
        $data = $this->bdd()->query("SELECT * FROM company WHERE id = ".$id);
        return $data->fetch();
    }

    // Récupération des scores d'une entreprise
    public function get_scores($id) {
        $data = $this->bdd()->query("
            SELECT score.*, 
            question.*,
            item.id,
            item.axe_id,
            item.name as item_name,
            axe.id,
            axe.name as axe_name

            FROM score
            JOIN question ON score.question_id = question.id
            JOIN item ON question.item_id = item.id
            JOIN axe ON item.axe_id = axe.id
            WHERE score.company_id = ".$id."
            ORDER BY score.question_id ASC;
        ");


        return $data->fetchAll();
    }

}

