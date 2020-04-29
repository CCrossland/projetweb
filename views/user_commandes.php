<?php
ob_start();
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
    </tr>
  </thead>

  <?php foreach ($commandes as $commande) : ?>

    <tbody>
      <th scope="row">Commande du : <?= $commande['date'] ?></th>

        <?php foreach ($articles as $article) : ?>
          <?php if ($article['commandeID'] == $commande['ID']) : ?>

            <tr>
              <td><?= str_replace("_"," ", $article['produitNom']) ?></th>
              <td><?= $article['prix'] ?> €</td>
              <td><img src="<?= ROOT_PATH . $article['produitImage'] ?>" width="100px" height="120px"></td>
              <td>
                <a href="<?= ROOT_PATH ?>article/<?= $article['produitNom'] ?>" class="btn btn-primary">Détails</a>
                <a href="<?= ROOT_PATH ?>public/download/jeuAcheté.zip" class="btn btn-primary">Télécharger</a>
              </td>
            </tr>

          <?php endif ?>
        <?php endforeach ?>

      <td></td>
      <td>Total : <?= $commande['total'] ?> €</td>

    </tbody>
  
  <?php endforeach ?>
  
</table>

<?php if (!empty($_SESSION['panier'])) : ?>
  <a href="<?= ROOT_PATH ?>commande" class="btn btn-warning">Passer Commande</a>
<?php endif ?>

<?php
$title = "Vos commandes";
$content = ob_get_clean();
include('includes/template.php');
?>