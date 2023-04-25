<?php include('layout/header.php'); ?>

<?php include('components/navbar.php'); ?>

<div class="row m-5">
    <div class="col">
        <h1 class="text-center">Axe Compétences</h1>
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
                    <th rowspan="6">Excellence Technique/Communauté de pratiques</th>
                    <td>Formations pour Apprendre à apprendre, changement de paradigme, &quot;être à la page&quot; (au-delà des compétences &quot;justes&quot; nécessaires)</td>
                    <td rowspan="6" class="align-middle text-center">1,166666667</td>
                    <td class="align-middle text-center">2</td>
                </tr>
                <tr>
                    <td>Le co-développement (outil d&#39;intelligence collective) existe-t-il dans l&#39;entreprise ?</td>
                    <td class="align-middle text-center">1</td>
                </tr>
                <tr>
                    <td>Les collaborateurs sont-ils amenés à partager leurs compétences et sous quelles formes ?</td>
                    <td class="align-middle text-center">2</td>
                </tr>
                <tr>
                    <td>Le mentoring (fonctionnement en binôme) existe-t-il pour assurer le transfert de compétences ?</td>
                    <td class="align-middle text-center">1</td>
                </tr>
                <tr>
                    <td>Les managers sont-ils aussi formateurs sur certains sujet pour l&#39;entreprise entière ?</td>
                    <td class="align-middle text-center">1</td>
                </tr>
                <tr>
                    <td>L&#39;entreprise favorise-t-elle l&#39;excellence technique ? (Principe 9 du Manifeste Agile)</td>
                    <td class="align-middle text-center">0</td>
                </tr>
                <tr>
                    <th rowspan="2">Faire agile</th>
                    <td>Déployez vous les pratiques du &quot;Faire Agile&quot;, c&#39;est-à-dire une ou plusieurs des &quot;méthodes&quot; agiles ?</td>
                    <td rowspan="2" class="align-middle text-center">1,5</td>
                    <td class="align-middle text-center">1</td>
                </tr>
                <tr>
                    <td>Votre entreprise promeut-elle un &quot;état d&#39;esprit agile&quot; ?</td>
                    <td class="align-middle text-center">2</td>
                </tr>
                <tr>
                    <th>Gestion humaine des compétences</th>
                    <td>Votre entreprise gère-t-elle humainement les compétences ?</td>
                    <td class="align-middle text-center">1</td>
                    <td class="align-middle text-center">1</td>
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