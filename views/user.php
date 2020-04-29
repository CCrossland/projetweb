<?php
ob_start();

?>
<img class="rounded-circle mx-auto d-block img-thumbnail" src="<?php echo $grav_url; ?>" alt="" />
<br>
Identifiant: <?= $user['ID']?>
<br>
Login: <?= $user['login']?>
<br>
Email: <?= $user['mail']?>
<br><p>  </p><br>
<a href="<?=ROOT_PATH?>user/<?= $user['login']?>/edit" class="btn btn-warning">Editer</a>
<a href="<?=ROOT_PATH?>user/<?= $user['login']?>/commandes" class="btn btn-warning">Vos commandes</a>

<?php
$title = "Mon compte";
$content = ob_get_clean();
include 'includes/template.php';
?>
