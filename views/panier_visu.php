<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?=ROOT_PATH?>public/css/bootstrap.min.css">
        <script src="<?=ROOT_PATH?>public/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="jumbotron">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prix</th>
      <th scope="col">Image</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($articles as $article):?>
      <tr>
        <th scope="row"><?= str_replace('_', ' ', $article['nom']) ?></th>
        <td><?= $article['prix'] ?></td>
        <td><img src="<?= ROOT_PATH.$article['image'] ?>"width="100px" height="120px"></td>
        <td>
          <a href="<?= ROOT_PATH ?>panier_visu/<?= $article['ID']?>/delete" class="btn btn-danger">Supprimer</a>
        </td>
      </tr>
    <?php endforeach ?>

    <td>Total : <?=$total?> €</td>
  </tbody>

</table>
</body>
</html>