<?php

class myDB{

    // Connection à la BDD (PDO)
    private function bdd() {
        include_once("connection.php");
        $pdo = new myPDO();
        return $pdo->connect();
    }
    
    #region AXES
    
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

        public function add_axe($name, $url) {
            try{
                $name = strip_tags($name);
                $url = strip_tags($url);

                $donnees = [
                    'id' => 0, 
                    'name' => $name,
                    'url' => $url,
                ];
                $sth = $this->bdd()->prepare("INSERT INTO axe VALUES (:id, :name, :url)");
                $sth->execute($donnees);
                //echo 'Entrée ajoutée dans la table';

                $data = $this->bdd()->query("SELECT MAX(id) AS id FROM axe");
                $coucou = $data->fetch();
                header('Location: /axe/'.$coucou['id']);
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        }

    #region AXES

    // Récupération d'un Axe entier avec Items et Questions
    public function get_axeall($id) {
        $data = $this->bdd()->query("
            SELECT
            axe.id AS axe_id,
            axe.name AS axe_name,
            item.id AS item_id,
            item.axe_id AS item_axe_id,
            item.name AS item_name,
            question.id AS question_id,
            question.item_id AS question_item_id,
            question.question AS question_question,
            question.max_score AS question_max_score
            FROM question
            LEFT JOIN item ON question.item_id = item.id
            LEFT JOIN axe ON item.axe_id = axe.id
            WHERE axe.id = ".$id
        );
        return $data->fetchAll();
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


    #region page company.php

        // Toutes les questions avec item et axe d'appartenance
        public function get_allaxe() {
            $data = $this->bdd()->query("
            SELECT
            axe.id AS axe_id,
            axe.name AS axe_name
            FROM `axe`;
            ");
            return $data->fetchAll();
        }


        // Toutes les questions avec item et axe d'appartenance
        public function get_allquestions($id) {
            $data = $this->bdd()->query("
            SELECT
            axe.id axe_id,
            axe.name axe_name,
            item.id item_id,
            item.name item_name,
            question.id question_id,
            question.question question_question,
            question.max_score question_max_score
            FROM question
            JOIN item ON item.id = question.item_id
            JOIN axe ON axe.id = item.axe_id
            WHERE axe_id = ".$id."
            ORDER BY axe.id ASC, item.id ASC, question.id ASC;
            ");
            return $data->fetchAll();
        }


        // Toutes les questions avec item et axe d'appartenance
        public function get_questionsreponse($company_id, $question_id) {
            $data = $this->bdd()->query("
            SELECT
            id AS score_id,
            company_id AS score_company_id,
            question_id AS score_question_id,
            score AS score_score,
            comment AS score_comment
            FROM score
            WHERE company_id = ".$company_id." AND question_id = ".$question_id.";
            ");
            return $data->fetchAll();
        }
        
        // Tous les scores d'une entreprise
        public function get_scores($id) {
            $data = $this->bdd()->query("
                SELECT * FROM score
                WHERE company_id = ".$id.";
            ");

            $questions = [];

            foreach($data->fetchAll() as $question) {
                $questions[$question['question_id']] = $question;
            }

            return $questions;
        }
        
        // Tous les scores d'une entreprise
        public function get_scores_company($id) {
            $result = [];
            $result['company'] = $this->get_company($id);

            $data = $this->bdd()->query("
            SELECT 
            score.*,
            question.id AS question_id,
            question.item_id AS question_item_id,
            question.question AS question_question,
            item.id AS item_id,
            item.axe_id AS item_axe_id,
            item.name AS item_name,
            axe.id AS axe_id,
            axe.name AS axe_name

            FROM score
            JOIN question ON score.question_id = question.id
            JOIN item ON question.item_id = item.id
            JOIN axe ON item.axe_id = axe.id
            WHERE score.company_id = ".$id."
            ORDER BY axe.id ASC, item.id ASC, question.id ASC;
            ");

            $result['score'] = $data->fetchAll();

            return $result;
        }

        public function add_company($name, $descrition) {
            try{
                $name = strip_tags($name);
                $descrition = strip_tags($descrition);

                $donnees = [
                    'id' => 0, 
                    'prenom' => $name,
                    'nom' => $descrition,
                    'date_ins' => date('Y-m-d G:i:s', time()+3600*2),
                ];
                $sth = $this->bdd()->prepare("INSERT INTO company VALUES (:id, :prenom, :nom, :date_ins)");
                $sth->execute($donnees);
                //echo 'Entrée ajoutée dans la table';
                
                $data = $this->bdd()->query("SELECT MAX(id) AS id FROM company");
                $coucou = $data->fetch();
                header('Location: /company/'.$coucou['id']);
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        }
        #endregion
}

