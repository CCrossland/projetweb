<?php 
ob_start();
?>

<br>
<a href="<?=ROOT_PATH?>article_add" class="btn btn-primary btn-lg"><h4>Ajouter un article</h4><a>
<br><p> </p><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Identifiant</th>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($articles as $article):?>
    <tr>
      <th scope="row"><?= $article['ID'] ?></th>
      <td><?= str_replace("_", " ", $article['nom']) ?></td>
      <td><?= $article['prix'] ?> €</td>
      <td><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="120px"></td>
      <td>
          <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Voir</a>
          <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>/edit" class="btn btn-warning">Editer</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?= $article['nom']?>">
              Supprimer
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal<?= $article['nom']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      Voulez-vous vraiment supprimer l'article <?= $article['nom']?> ?
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
$title = "Administration des articles";
$content = ob_get_clean();
include('includes/template.php');
?>