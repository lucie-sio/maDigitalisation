<?php

include_once("fonction/query.php");
$db = new myDB();
$axes = $db->get_axes();
$companies = $db->get_companies();

?>

<nav class="navbar navbar-expand-lg bg-body-secondary">
  <div class="container-fluid">
    <img src="assets/logo.png" alt="Digitalisation" height="50" width="50">
    <div class="navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Accueil</a>
        </li>

        <!-- Liste des Axes -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Axes
          </a>
          <ul class="dropdown-menu">
            <?php foreach($axes as $var): ?>
              <li>
                <form method="POST" action="axe.php">
                  <input type="hidden" name="id" value="<?= $var['id'] ?>">
                  <button class="dropdown-item" type="submit"><?= $var['name'] ?></button>
                </form>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>

        <!-- Liste des Entreprises -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Entreprises
          </a>
          <ul class="dropdown-menu">
            <?php foreach($companies as $var): ?>
              <li>
                <form method="POST" action="company.php">
                  <input type="hidden" name="id" value="<?= $var['id'] ?>">
                  <button class="dropdown-item" type="submit"><?= $var['name'] ?></button>
                </form>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>