<?php include('layout/header.php'); 

include_once("fonction/query.php");
$db = new myDB();

if(!isset($_POST['id'])){
    die();
}

$company = $db->get_company($_POST['id']);
$scores = $db->get_scores($_POST['id']);
$currentAxe = -1;

include('components/navbar.php'); ?>

<div class="row m-5">
    <div class="col text-center">
        <h1><?= $company['name'] ?></h1>
        <h3><?= $company['description'] ?></h3>
    </div>
</div>


<div class="row m-5">
    <div class="col">
        <table class="table table-striped table-bordered table-sm">

            <thead>
                <tr>
                    <th>Item</th>
                    <th>Question</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($scores as $var): ?>
                    <?php if($var['axe_id'] !== $currentAxe): ?>
                        <?php $currentAxe = $var['axe_id'] ?>
                        <tr>
                            <td scope="col" colspan="3" class="text-center"><h1><?= $var['axe_name'] ?></h1></td>
                        </tr>
                        <tr>
                            <td><?= $var['item_name'] ?></td>
                            <td><?= $var['question'] ?></td>
                            <td><?= $var['score'] ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td><?= $var['item_name'] ?></td>
                        <td><?= $var['question'] ?></td>
                        <td><?= $var['score'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>




        </table>
            
        </div>
    </div>


<?php include('layout/footer.php'); ?>