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


<table class="table table-striped">
    <thead>
        <th>name</th>
        <th>question</th>
        <th>max_score</th>
    </thead>
    <tbody>
        <?php
            $rows = $db->get_axeall($axeId);
            $idNBOccurences = array();
            foreach($rows as $row){
                $idNB = $row['item_id'];
                if(!isset($idNBOccurences[$idNB])){
                    $idNBOccurences[$idNB] = 0;
                }
                $idNBOccurences[$idNB]++;
            }
            
            $var_tpm = "";
            foreach($rows as $row) {
                echo '<tr>';
                if($var_tpm != $row['item_id']){
                    $test = $row['item_id'];
                    echo '<td rowspan="'.$idNBOccurences[$row['item_id']].'">'.$row['item_name'].'</td>';
                }
                echo'
                <td>'.$row['question_question'].'</td>
                <td>'.$row['question_max_score'].'</td>
            </tr>';
                $var_tpm = $row['item_id'];
            }
        ?>
    </tbody>
</table>



<?php include('layout/footer.php'); ?>