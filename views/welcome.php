<?php 
ob_start();
?>

<div id="welcomeContainer1">

    <div id="welcomeContainer2">


        <img id="welcomeImage1" src="<?= ROOT_PATH ."public/images/band.jpg" ?>" >


        <div id="welcomeConsoleList1">
            <?php foreach($consoles as $console) : ?>
                <a href="<?= ROOT_PATH ?>article/<?= $console['nom'] ?>" type="button" class="btn btn-primary" id="welcomeConsoleListElements"><?= $console['nom'] ?></a>
            <?php endforeach ?>
        </div>



    </div>
</div>

<?php
$title="Accueil";
$content= ob_get_clean();
include 'includes/template.php';
?>

