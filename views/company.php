<?php 

include_once("fonction/query.php");
$db = new myDB();
$company = $db->get_company($id);

if(!$company){
    header('Location: /404');
}

$get_allaxe = $db->get_allaxe();


include('layout/header.php'); ?>

<!-- AFFICHAGE -->
<div class="row m-5">
    <div class="col text-center">
        <h1><?= $company['name'] ?></h1>
        <h3><?= $company['description'] ?></h3>
    </div>
</div>
<FROM>
<button type="submit" class="btn btn-info position-fixed top-0 end-0 m-3">Enregistrer la grille</button>

<?php

$chartLabels = array();
$chartValues = array();
$chartArray = [];

foreach($get_allaxe as $allaxe) {
    $get_allquestions = $db->get_allquestions($allaxe['axe_id']);
    if(!empty($get_allquestions)) {
        
        // $chartarray[$allaxe['axe_id']] = $allaxe['axe_name'];

        $chartArray[$allaxe['axe_name']]['score'] = 0;
        $chartArray[$allaxe['axe_name']]['nb'] = 0;

        echo '
        <div class="row m-5">
            <div class="col">
                <h1 class="text-center">'.$allaxe['axe_name'].'</h1>
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr class="text-center">
                            <th>Item</th>
                            <th>Question</th>
                            <th>Score</th>
                            <th>MAX Score</th>
                        </tr>
                    </thead>
                    <tbody>
                    ';
                    $idNBOccurences = array();
                    foreach($get_allquestions as $allquestions){
                        $idNB = $allquestions['item_id'];
                        if(!isset($idNBOccurences[$idNB])){
                            $idNBOccurences[$idNB] = 0;
                        }
                        $idNBOccurences[$idNB]++;
                    }
                    
                    $var_tpm = "";
                    foreach($get_allquestions as $allquestions) {
                        $get_questionsreponse = $db->get_questionsreponse($id, $allquestions['question_id']);
                        $reponsescore = "0";
                        foreach($get_questionsreponse as $allquestionsRESPONSE) {
                            $reponsescore = $allquestionsRESPONSE['score_score'];
                        }
                        $chartArray[$allaxe['axe_name']]['score'] += $reponsescore;
                        $chartArray[$allaxe['axe_name']]['nb']++;

                        echo '<tr>';
                        if($var_tpm != $allquestions['item_id']){
                            $test = $allquestions['item_id'];
                            echo '<td rowspan="'.$idNBOccurences[$allquestions['item_id']].'">'.$allquestions['item_name'].'</td>';
                        }
                        echo'
                        <td>'.$allquestions['question_question'].'</td>

                        <td><input type="number" max="'.$allquestions['question_max_score'].'" min="0" value="'.$reponsescore.'"></input></td>
                        <td class="text-center">'.$allquestions['question_max_score'].'</td>
                    </tr>';
                        $var_tpm = $allquestions['item_id'];
                    }
                    echo '
                </tbody>
            </table>
            </div>
            </div>';
            
            // echo ($chartArray[$allaxe['axe_name']]['score'])/($chartArray[$allaxe['axe_name']]['nb']); 
            array_push($chartLabels, $allaxe['axe_name']);
            $total = $chartArray[$allaxe['axe_name']]['score']/$chartArray[$allaxe['axe_name']]['nb'];
            array_push($chartValues, $total);

        }

    }
    ?>
    </form>


    <div>
  <canvas id="myChart" width="1" height="1"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php 
$data = "12, 19, 3";
$labels = "Red, Blue, Yellow";

$data = '';
foreach ($chartValues as &$chartValue) {
    $data .= $chartValue.', ';
}

$labels = '';
foreach ($chartLabels as &$chartLabel) {
    $labels .= '"'.$chartLabel.'", ';
}


// json_encode(array_values($chartLabels))
// https://stackoverflow.com/questions/49382609/how-to-have-a-simple-array-without-key-from-an-array-key-value
?>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'radar',
    data: {
        <?php echo 
        'labels: ['.$labels.'],';
        ?>
      datasets: [{
        label: '<?= $company['name'] ?>',
        <?php echo 
        'data: ['.$data.'],';
        ?>
        fill: true,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgb(255, 99, 132)',
        pointBackgroundColor: 'rgb(255, 99, 132)',
        pointBorderColor: '#fff',
        pointHoverBackgroundColor: '#fff',
        pointHoverBorderColor: 'rgb(255, 99, 132)'
      }]
    },
    options: {
    elements: {
      line: {
        borderWidth: 3
      }
    }, scale: {
        beginAtZero: true,

            max: 2,
        min: 0,
        stepSize: 1

}
  },
  
  });






  
</script>

<?php include('layout/footer.php'); ?>