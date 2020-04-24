<?php 
ob_start();
?>
<br>
<h4>Commande du <?= $date ?> par <?= $userLogin ?></h4> 

<table class="table">
  <thead>
    <tr>
      <th scope="col">Jeu</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($detailsCommande as $details):?>
      <tr>
        <th scope="row"><?= $details['produitNom'] ?></th>
        <td><?= $details['prix'] ?></td>
        <td><img src="<?= ROOT_PATH.$details['image'] ?>"width="100px" height="120px"></td>
        <td>
          <a href="<?=ROOT_PATH?>article/<?= $details['produitNom']?>" class="btn btn-primary">Détails</a>
        </td>
      </tr>
    <?php endforeach ?>

    <td set='0.2'>Total : <?=$total?> €</td>
  </tbody>
</table>

<?php
  $title = "Détails de la Commande ".REQ_TYPE_ID;
  $content = ob_get_clean();
  include('includes/template.php');
?>