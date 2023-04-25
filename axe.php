<?php include('layout/header.php'); 

$axeId = $_POST['id'];

include_once("fonction/query.php");
$db = new myDB();
$axe = $db->get_axe($axeId);


include('components/navbar.php'); ?>

<div class="row m-5">
    <div class="col">
        <h1 class="text-center">Axe <?= $axe['name'] ?></h1>
    </div>
</div>


<?php include('layout/footer.php'); ?>