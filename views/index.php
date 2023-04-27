<?php 

include_once("fonction/query.php");
$db = new myDB();
$axes = $db->get_axes();

include('layout/header.php'); ?>

<!-- AFFICHAGE -->
<div class="row m-5">
    <div class="col">
        <h1 class="text-center">La digitalisation de l'entreprise</h1>
    </div>
</div>

<div class="row text-center m-5">

    <?php foreach($axes as $var): ?>
    <div class="col-lg-4">
        <img src="<?= $var['img_url'] ?>" alt="" height="70">
        <h2 class="fw-normal"><?= $var['name'] ?></h2>
        <p>Compétences des collaborateurs de l'entreprise</p>
        <p>
            <a class="btn btn-info" href="/axe/<?= $var['id'] ?>">Voir l'axe</a>
        </p>
    </div>
    <?php endforeach; ?>

</div>

<!-- FOOTER -->
<footer class="row fixed-bottom">
    <div class="col text-center m-1">
        <p class="text-muted"><?= date("Y"); ?> <?= shell_exec('git describe --tags --abbrev=0'); ?></p>
    </div>
</footer>


<?php include('layout/footer.php'); ?>