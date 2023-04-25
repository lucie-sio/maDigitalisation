<?php include('layout/header.php'); 

$axeId = $_GET['id'];

include('components/navbar.php'); ?>

<div class="row m-5">
    <div class="col">
        <h1 class="text-center">Axe <?= $axeId ?></h1>
    </div>
</div>


<?php include('layout/footer.php'); ?>