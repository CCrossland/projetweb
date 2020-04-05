<?php 
ob_start();
?>
<h3>Liste des utilisateurs</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">IDentifiant</th>
      <th scope="col">Login</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach($users as $user):?>
    <tr>
      <th scope="row"><?= $user['ID'] ?></th>
      <td><?= $user['login'] ?></td>
      <td><?= $user['mail'] ?></td>
      <td>
          <a href="<?=ROOT_PATH?>user/<?= $user['login']?>" class="btn btn-primary">Voir<a>
          <a href="<?=ROOT_PATH?>user/<?= $user['login']?>/edit" class="btn btn-warning">Editer</a>
          <?php if($_SESSION['id'] != $user['ID']):?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?= $user['ID']?>">
              Supprimer
            </button>

            <!-- Modal -->
            <div class="modal fade" ID="modal<?= $user['ID']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hIDden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" ID="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hIDden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      Voulez-vous vraiment supprimer l'utilisateur <?= $user['login']?> ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <a href="<?= ROOT_PATH ?>user/<?= $user['login']?>/delete" class="btn btn-danger">Supprimer<a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif?>
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