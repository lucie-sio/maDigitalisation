<?php include('layout/header.php'); 

include_once("fonction/query.php");
$db = new myDB();
if(isset($_POST['id'])){
    $company = $db->get_company($_POST['id']);
} else {
    die();
}


include('components/navbar.php'); ?>

<div class="row m-5">
    <div class="col">
        <h1 class="text-center"><?= $company['name'] ?></h1>
    </div>
</div>


<?php include('layout/footer.php'); ?>