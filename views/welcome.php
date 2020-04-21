<?php 
ob_start();
?>

<?php /*
<div style="margin-top: 25px">
    <button class="btn btn-light" style="margin-top: 5px; height: 40px; width: 200px" checked="true">Recherche par genres</button>
    <?php foreach($genres as $genre) : ?>
        <a href="<?= ROOT_PATH ?>article/<?= $genre['nom'] ?>" type="button" class="btn btn-info" style="margin-top: 5px;  height: 40px; width: 200px"><?= $genre['nom'] ?></a>
    <?php endforeach ?>
</div>
*/?>

<br>

<div style="margin-top: 15px">
    <button class="btn btn-info" style="margin-top: 8px; margin-left: 8px; height: 40px; width: 30%; pointer-events: none;">Recherche par consoles :</button>
    <?php foreach($consoles as $console) : ?>
        <a href="<?= ROOT_PATH ?>article/<?= $console['nom'] ?>" type="button" class="btn btn-warning" style="margin-top: 8px; margin-left: 8px; height: 40px; width: 30%"><?= $console['nom'] ?></a>
    <?php endforeach ?>
</div>

<?php
$title="Accueil";
$content= ob_get_clean();
include 'includes/template.php';
?>

