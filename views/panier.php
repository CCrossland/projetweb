<?php 
ob_start();
?>

<h3>Votre panier :</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($articles as $article):?>
      <tr>
        <th scope="row"><?= $article['nom'] ?></th>
        <td><?= $article['prix'] ?></td>
        <td><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="120px"></td>
        <td>
          <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Détails</a>
          <a href="<?= ROOT_PATH ?>panier/<?= $article['ID']?>/delete" class="btn btn-danger">Supprimer</a>
        </td>
      </tr>
    <?php endforeach ?>

    <td>Total : <?=$total?> €</td>
  </tbody>

</table>

<?php if(!empty($_SESSION['panier'])):?>
  <a href="<?=ROOT_PATH?>commande" class="btn btn-warning">Passer Commande</a>
<?php endif?>

<?php
  $title = "Panier";
  $content = ob_get_clean();
  include('includes/template.php');
?>