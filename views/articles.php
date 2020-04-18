<?php /*
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
include('includes/template.php'); */
?> 

<?php
ob_start();
?>

<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="options" id="option1" autocomplete="off" checked=""> Active
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option2" autocomplete="off"> Radio
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="options" id="option3" autocomplete="off"> Radio
  </label>
</div>

<div class="card-deck">
  <div class="row">
    <?php foreach ($articles as $article) : ?>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="<?= ROOT_PATH . $article['image'] ?>" width="325" height="225" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title"><?= $article['nom'] ?></h3>
            <h5 class="card-subtitle"><?= $article['genreNom'] ?> - <?= $article['consoleNom'] ?></h5>
            <br/>
            <h5 class="card-subtitle"><?= $article['prix'] ?> €</h5>
            <a href="<?= ROOT_PATH ?>article/<?= $article['nom'] ?>" class="btn btn-primary">Détails<a>

          </div>
          <div class="card-footer">
          <?php if ($_SESSION) : ?>
              <a class="btn btn-warning" href="<?= ROOT_PATH ?>panier/<?= $article['ID'] ?>/add">Ajouter au panier</a>
            <?php endif ?>
          </div>
        </div>
        <br>
      </div>
    <?php endforeach ?>
  </div>
  <br>
</div>
<?php
$title = "Articles";
$content = ob_get_clean();
include('includes/template.php');
?>