<?php
ob_start();
?>

<div class="btn-group btn-group-toggle" data-toggle="buttons" style="height: 50px; width: 100%;">
  <?php foreach ($consoles as $console) : ?>
    <a href="<?= ROOT_PATH ?>article/<?= $console['direction'] ?>" class="btn btn-primary <?= $console['active'] ?>" type="radio"><?= $console['nom'] ?></a>
  <?php endforeach ?>
</div>

<br><p>   </p><br>

<div class="card-deck">
  <div class="row">
    <?php foreach ($articles as $article) : ?>
      <div  id="<?= $article['ID'] ?>" class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="card border-light" style="width: 91%;">
          <img class="card-img-top" src="<?= ROOT_PATH . $article['image'] ?>" width="300" height="350" alt="Card image cap">

          <div class="card-body" style="height: 200px">
            <h3 class="card-title"><?= str_replace('_', ' ', $article['nom']) ?></h3>
            <h5 class="card-subtitle"><?= $article['genreNom'] ?> - <?= $article['consoleNom'] ?></h5>
            <br/>
            <h5 class="card-subtitle"><?= $article['prix'] ?> €</h5>
            <a href="<?= ROOT_PATH ?>article/<?= $article['nom'] ?>" class="btn btn-primary">Détails<a>
          </div>

          <div class="card-footer">
          
              <a class="btn btn-warning" href="<?= ROOT_PATH ?>panier/<?= $article['ID'] ?>/add">Ajouter au panier</a>
          
          </div>

        </div>
        <br>
      </div>
    <?php endforeach ?>
  </div>
  <br>
</div>
<?php
$title = "Boutique";
$content = ob_get_clean();
include('includes/template.php');
?>