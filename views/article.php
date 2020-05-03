<?php ob_start() ?>

<img id="imgArticle1" src="<?= ROOT_PATH . $article['image'] ?>" width="32%" height="400">


<?php if(!empty($article['video'])) : ?>
<iframe frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-top: 25px; float:right" width="65%" height="400"
src=<?= $article['video']?>>
</iframe>
<?php endif ?>

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

<a href="<?= ROOT_PATH ?>panier/<?= $article['ID'] ?>/add" class="btn btn-success btn-lg">Ajouter au panier</a>
<a href="<?= ROOT_PATH ?>article#<?= $article['ID'] ?>" class="btn btn-primary btn-lg">Revenir aux articles</a>

<?php
$title=$article['nom'];
$content = ob_get_clean();
include 'includes/template.php';
?>
