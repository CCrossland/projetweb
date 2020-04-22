<?php 
ob_start();
?>
<h3>Liste des Commandes</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">login</th>
      <th scope="col">Date de commande</th>
      <th scope="col">Nombre d'articles</th>
      <th scope="col">Prix total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($commandes as $commande):?>
    <tr>
      <th scope="row"><?= $commande['login'] ?></th>
      <td><?= $commande['commandeDate'] ?></td>
      <td><?= $commande['countProduit'] ?></td>
      <td><?= $commande['total'] ?> €</td>
      <td>
          <a href="<?=ROOT_PATH?>/book_details" class="btn btn-primary">Voir</a>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
<?php
$title = "Administration";
$content = ob_get_clean();
include('includes/template.php');
?>