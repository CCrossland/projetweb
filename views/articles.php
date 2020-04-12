<?php 
ob_start();
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Identifiant</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($articles as $article):?>
    <tr>
      <th scope="row"><?= $article['ID'] ?></th>
      <td><?= $article['nom'] ?></td>
      <td><?= $article['prix'] ?> €</td>
      <td><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="100px"></td>
      <td>
        <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Détails<a>
        <?php if($_SESSION): ?>
        <a href="<?=ROOT_PATH?>panier/<?= $article['ID']?>/add" class="btn btn-warning">Ajouter au panier</a>
        <?php endif ?>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
<?php
$title = "Articles";
$content = ob_get_clean();
include('includes/template.php');
?>