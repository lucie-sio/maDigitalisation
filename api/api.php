<?php

class API {
    
    // Pour interpréter le résultat de la route en JSON
    private function init() {
        header('Content-Type: application/json');
    }

    // Connection à la BDD (PDO)
    private function db() {
        include_once("./fonction/query.php");
        return new myDB();
    }

    public function test(){
        $this->init();
        $data = "Ceci est un Test API";
        return json_encode($data);
    }

    // api/axes
    public function axes(){
        $this->init();
        $data = $this->db()->get_axes();
        return json_encode($data);
    }

    // api/axes/$id
    public function axe($id){
        $this->init();
        $data = $this->db()->get_axeall($id);
        return json_encode($data);
    }

    // api/companies
    public function companies(){
        $this->init();
        $data = $this->db()->get_companies();
        return json_encode($data);
    }

    public function company($id){
        $this->init();
        $data = $this->db()->get_scores_company($id);
        return json_encode($data);   
    }
}