<?php

include_once("fonction/query.php");
$db = new myDB();
$axes = $db->get_axes();

?>

<nav class="navbar navbar-expand-lg bg-body-secondary">
  <div class="container-fluid">
    <img src="assets/logo.png" alt="Digitalisation" height="50" width="50">
    <div class="navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Axes
          </a>
          <ul class="dropdown-menu">

            <?php foreach($axes as $axe): ?>
              <li><a class="dropdown-item" href="axe.php?id=<?= $axe['id'] ?>"><?= $axe['name'] ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>