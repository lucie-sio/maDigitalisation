<?php


function get_conection($statut = 0) {
    include("conection.php");
    return $conn;
}

function get_axe() {
    $stm = (get_conection())->query("SELECT * FROM axe");
    $rows = $stm->fetchAll();
    foreach($rows as $row) {
        echo $row['name'].'<br>';
    }
}



get_axe();



?>