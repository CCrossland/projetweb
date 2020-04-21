<?php 
ob_start();
?>


<br>
<h4>Vous pouvez à présent télécharger vos jeux ici ou sur <a href="<?=ROOT_PATH?>user/<?=$user['nom']?>/commandes">votre historique d'achat</a></h4> 
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
        <td><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="120px"></td>
        <td>
          <a href="<?=ROOT_PATH?>article/<?= $article['nom']?>" class="btn btn-primary">Détails</a>
        </td>
        <td>
          <button href="" class="btn btn-primary">Télécharger</button>
        </td>
      </tr>
    <?php endforeach ?>

    <td set='0.2'>Total : <?=$total?> €</td>
  </tbody>
</table>

<?php
  $title = "Votre commande a été effectuée!";
  $content = ob_get_clean();
  include('includes/template.php');
?>