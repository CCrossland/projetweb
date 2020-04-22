<?php ob_start() ?>

<img style="margin-top: 25px" src="<?= ROOT_PATH . $article['image'] ?>" width="300" height="350">

<dl class="row" style="margin-top: 35px">
    <dt class="col-sm-2">Console</dt> 
    <dd class="col-sm-10"><?= $article['consoleNom']?></dd>
    <dt class="col-sm-2">Genre</dt> 
    <dd class="col-sm-10"><?= $article['genreNom']?></dd>
    <dt class="col-sm-2">Multijoueur</dt> 
    <dd class="col-sm-10"><?= $article['multijoueur']?></dd>
    <dt class="col-sm-2">Limite d'âge</dt> 
    <dd class="col-sm-10"><?= $article['limiteAge']?></dd>
    <dt class="col-sm-2">Description</dt> 
    <dd class="col-sm-10"><?= $article['description']?></dd>
    <dt class="col-sm-2">Prix</dt> 
    <dd class="col-sm-10"><?= $article['prix']?> €</dd>
</dl>

<a href="<?= ROOT_PATH ?>article#<?= $article['ID'] ?>" class="btn btn-primary btn-lg">Revenir aux articles</a>

<?php
$title=$article['nom'];
$content = ob_get_clean();
include 'includes/template.php';
?>
