<?php 

include_once("fonction/query.php");
$db = new myDB();
$axe = $db->get_axe($id);

if(!$axe){
    header('Location: /404');
}

$rows = $db->get_axeall($id);

include('layout/header.php'); ?>

<!-- AFFICHAGE -->
<div class="row m-5">
    <div class="col">
        <h1 class="text-center">Axe <?= $axe['name'] ?></h1>
    </div>
</div>

<div class="row m-5">
    <div class="col">
        <table class="table table-striped table-bordered table-sm">
            
            <thead>
                <tr class="text-center">
                    <th>Item</th>
                    <th>Question</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                        <td class="text-center">'.$row['question_max_score'].'</td>
                    </tr>';
                        $var_tpm = $row['item_id'];
                    }
                ?>
            </tbody>
            
        </table>
    </div>
</div>

<?php include('layout/footer.php'); ?>