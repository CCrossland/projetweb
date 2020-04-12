<?php 
ob_start();
?>

<h3>Commande effectuée :</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($articles as $article):?>
      <tr>
        <th scope="row"><?= $article['nom'] ?></th>
        <td><?= $article['prix'] ?></td>
        <td><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="100px"></td>
        <td>
          <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Voir</a>
        </td>
      </tr>
    <?php endforeach ?>

    <td set='0.2'>Total : <?=$total?> €</td>
  </tbody>

</table>

<?php
  $title = "Commande";
  $content = ob_get_clean();
  include('includes/template.php');
?>