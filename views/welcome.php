<?php 
ob_start();
?>

<!-- <div style="background-image:url(<?= ROOT_PATH ."public/images/band.jpg" ?>);margin-left: auto; margin-right: auto; margin-top: 20px; width: 92%; height:350;"> -->


<div style="height: 360px; margin-top: 40px;">

    <div style="position: relative; margin-left: auto; margin-right: auto; margin-top: 20px; width: 100%;">


        <img class="flex-container" style="position: absolute; margin-left: auto; margin-right: auto; margin-top: 1px; width: 100%;" src="<?= ROOT_PATH ."public/images/band.jpg" ?>" >


        <div style="position: relative; left: 10%; top: 260px; margin-right: auto; width: 90%">
            <!-- <button class="btn btn-black" style="margin-top: 8px; margin-left: 9px; height: 40px; width: 30%; pointer-events: none;">Recherche par consoles :</button><br/> -->
            <?php foreach($consoles as $console) : ?>
                <a href="<?= ROOT_PATH ?>article/<?= $console['nom'] ?>" type="button" class="btn btn-primary" style=" margin-left: 0.35%; height: 40px; width: 17%"><?= $console['nom'] ?></a>
            <?php endforeach ?>
        </div>



    </div>
</div>

<?php
$title="Accueil";
$content= ob_get_clean();
include 'includes/template.php';
?>

