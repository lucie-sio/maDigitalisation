<?php include('layout/header.php'); ?>

<?php include('components/navbar.php'); ?>

<div class="row m-5">
    <div class="col">
        <h1 class="text-center">Axe Réactivité</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Items</th>
                    <th>Questionnements</th>
                    <th class="text-center">Score</th>
                    <th class="text-center">Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th rowspan="3">Vélocité de réponse</th>
                    <td>Valeur supérieure utilisable livrée plus tôt (Fonction principale utilisable dès les premières versions)</td>
                    <td rowspan="3" class="align-middle text-center">1,666666667</td>
                    <td class="align-middle text-center">2</td>
                </tr>
                <tr>
                    <td>Réactivité face aux impératifs prépondérants</td>
                    <td class="align-middle text-center">2</td>
                </tr>
                <tr>
                    <td>Mesure de la vélocité de l&#39;équipe (indicateur de suivi du travail d&#39;une équipe de conception)</td>
                    <td class="align-middle text-center">1</td>
                </tr>
                <tr>
                    <th rowspan="4">Environnements souples</th>
                    <td>Les installations techniques et de gestion sont modernes (TIC/ERP/CRM)</td>
                    <td rowspan="4" class="align-middle text-center">1,25</td>
                    <td class="align-middle text-center">1</td>
                </tr>
                <tr>
                    <td>Les équipes sont en capacité d&#39;autonomiser une partie de leurs tâches</td>
                    <td class="align-middle text-center">1</td>
                </tr>
                <tr>
                    <td>Les équipes s’inscrivent dans un cadre Agile Lean</td>
                    <td class="align-middle text-center">1</td>
                </tr>
                <tr>
                    <td>Les mécanismes de livraison et de synchronisation sont matures</td>
                    <td class="align-middle text-center">2</td>
                </tr>
                <tr>
                    <th rowspan="3">Défi environnemental</th>
                    <td>Les innovations produit tiennent compte de l&#39;urgence climatique</td>
                    <td rowspan="3" class="align-middle text-center">0,333333333</td>
                    <td class="align-middle text-center">1</td>
                </tr>
                <tr>
                    <td>Les processus internes sont remis en cause pour diminuer leur impact environnemental</td>
                    <td class="align-middle text-center">0</td>
                </tr>
                <tr>
                    <td>Les parties prenantes sont sélectionnées en fonction de leur éthique vis-à-vis du développement durable</td>
                    <td class="align-middle text-center">0</td>
                </tr>
                <tr>
                    <th>Veille et benchmark</th>
                    <td>Veille stratégique</td>
                    <td class="align-middle text-center">2</td>
                    <td class="align-middle text-center">2</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                  <td colspan="2" class="text-end">Sum</td>
                  <td class="text-center">$180</td>
                  <td class="text-center">$180</td>
              </tr>
          </tfoot>
      </table>
  </div>
</div>

<?php include('layout/footer.php'); ?>