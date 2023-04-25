<?php 

include_once("fonction/query.php");
$db = new myDB();
$axes = $db->get_axes();

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
			<p>
				<form method="POST" action="axe.php">
					<input type="hidden" name="id" value="<?= $axe['id'] ?>">
					<button class="btn btn-secondary" type="submit" href="axe.php">Voir l'axe</button>
				</form>
			</p>
		</div>
      <?php endforeach; ?>

    </div>
<?php include('layout/footer.php'); ?>
