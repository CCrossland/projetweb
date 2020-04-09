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
    </tr>
  </thead>
  <tbody>

  <?php foreach($articles as $article):?>
    <tr>
      <th scope="row"><?= $article['nom'] ?></th>

      <?php foreach($commandesEnPanier as $commandeProduit):?>
        <?php if($commandeProduit['produitID'] == $article['ID']):?>
          <td><?= $commandeProduit['prix'] ?></td>
        <?php endif ?>
      <?php endforeach ?>

      <td><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="100px"></td>
      <td>
          <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Voir<a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?= $article['ID']?>">
              Supprimer
            </button>

            <div class="modal fade" id="modal<?= $article['ID']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      Voulez-vous vraiment supprimer l'article <?= $article['nom']?> de votre panier ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <a href="<?= ROOT_PATH ?>article/<?= $article['nom']?>/delete" class="btn btn-danger">Supprimer<a>
                  </div>
                </div>
              </div>
            </div>
      </td>
    </tr>
<?php endforeach ?>

  </tbody>
</table>
<?php
$title = "Panier";
$content = ob_get_clean();
include('includes/template.php');
?>