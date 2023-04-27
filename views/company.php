<?php 

include_once("fonction/query.php");
$db = new myDB();
$company = $db->get_company($id);

if(!$company){
    header('Location: /404');
}

$questions = $db->get_questions();
$scores = $db->get_scores($id);

$currentAxe = -1;

function getScore($idQuestion){
    global $scores;
    return isset($scores[$idQuestion]['score']) ? $scores[$idQuestion]['score'] : false;
}
function saveScores($idCompany){

}

include('layout/header.php'); ?>

<!-- AFFICHAGE -->
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
                <tr class="text-center">
                    <th>Item</th>
                    <th>Question</th>
                    <th>Score</th>
                </tr>
            </thead>

            <form action="/company/<?= $company['id'] ?>" method="POST">
                <!-- <input type="hidden" name="companyId" value="<?= $company['id'] ?>"> -->
                <tbody>

                    <?php foreach($questions as $var): ?>
                        <?php if($var['axe_id'] !== $currentAxe): ?>
                            <?php $currentAxe = $var['axe_id'] ?>
                            <tr>
                                <td scope="col" colspan="3" class="text-center"><h1><?= $var['axe_name'] ?></h1></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td><?= $var['item_name'] ?></td>
                            <td><?= $var['question_question'] ?></td>
                            <?php if(!isset($scores[$var['question_id']]['score'])): ?>
                                <td>
                                    <div class="form-outline">
                                        <input 
                                            type="number" 
                                            name="questions[<?= $var['question_id'] ?>]" 
                                            id="<?= $var['question_id'] ?>" 
                                            value="" 
                                            min="0"
                                            max="<?= $var['question_max_score'] ?>"
                                            class="form-control"
                                        />
                                    </div>
                                </td>
                            <?php else: ?>
                                <td>
                                    <div class="form-outline">
                                        <input 
                                            id="<?= $var['question_id'] ?>" 
                                            type="number" 
                                            value="<?= $scores[$var['question_id']]['score'] ?>" 
                                            min="0"
                                            max="<?= $var['question_max_score'] ?>"
                                            class="form-control" 
                                        />
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <button type="submit" class="btn btn-info position-fixed top-0 end-0 m-3">Enregistrer la grille</button>
            </form>

        </table>
    </div>
</div>

<?php include('layout/footer.php'); ?>