<?php
    include_once("fonction/query.php");
    $db = new myDB();
    $axes = $db->get_axes();
    $companies = $db->get_companies();


    if((isset($_POST['POST_name'])) AND (isset($_POST['POST_Descrit']))){
        $db->add_company($_POST['POST_name'], $_POST['POST_Descrit']);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Onglet -->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
        <title>Digitalisation</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" href="../style/styles.css">
    </head>
    <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <img src="../assets/logo.png" alt="Digitalisation" height="50" width="50">
            <div class="navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                    </li>

                    <!-- Liste des Axes -->
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Axes
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach($axes as $var): ?>
                        <li>
                            <a class="dropdown-item" href="/axe/<?= $var['id'] ?>"><?= $var['name'] ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    </li>

                    <!-- Liste des Entreprises -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Entreprises
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach($companies as $var): ?>
                            <li>
                                <a class="dropdown-item" href="/company/<?= $var['id'] ?>"><?= $var['name'] ?></a>
                            </li>
                            <?php endforeach; ?>
                            <li>
                                <!-- Button trigger modal -->
                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ADDENT">
                                  Ajouter Entreprises
                                </button>
                                <!-- Button trigger modal -->
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



<!-- Modal -->
<div class="modal fade" id="ADDENT" tabindex="-1" aria-labelledby="ADDENTLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ADDENTLabel">Ajouter une entreprises</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nom :</label>
                        <input type="text" class="form-control" id="recipient-name" name="POST_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Description :</label>
                        <textarea class="form-control" id="message-text" name="POST_Descrit" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Enregistrement</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->