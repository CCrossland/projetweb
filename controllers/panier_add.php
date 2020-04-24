<?php
require_once 'models/book.php';

if (!$_SESSION)
{
    $_SESSION['panier'] = array();
}

array_push($_SESSION['panier'], REQ_TYPE_ID);

$_SESSION['message']='Votre article a bien été ajouté';

$_SESSION['articleBooked'] += 1;

header('location: '.ROOT_PATH.'article#'.REQ_TYPE_ID);
?>