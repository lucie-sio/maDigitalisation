<?php 

include("fonction/query.php");
$db = new myDB();
$axes = $db->get_axe();

include('layout/header.php');
include('components/navbar.php'); 
?>

    <div class="row m-5">
        <div class="col">
            <h1 class="text-center">La digitalisation de l'entreprise</h1>
        </div>
    </div>

    <div class="row text-center m-5">

      <?php foreach($axes as $axe): ?>
		<div class="col-lg-4">
			<img src="<?= $axe['img_url'] ?>" alt="" width="70" height="70">
			<h2 class="fw-normal"><?= $axe['name'] ?></h2>
			<p>Compétences des collaborateurs de l'entreprise</p>
			<p><a class="btn btn-secondary" href="axe.php?id=<?= $axe['id'] ?>">Voir l'axe</a></p>
		</div>
      <?php endforeach; ?>
	  
    </div>
<?php include('layout/footer.php'); ?>
