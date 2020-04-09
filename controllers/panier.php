<?php

require 'models/articles.php';
require 'models/users.php';
require 'models/book.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}

$commandes = getAllCommandeByUserID($_SESSION['id']);

$articles = array();
$commandesEnPanier= array();

foreach($commandes as $commande)
{
    $commandesProduit = getAllCommandeProduitByCommandeId($commande['ID']);

    foreach($commandesProduit as $commandeProduit)
    {
        array_push($articles, getJeuById($commandeProduit['produitID']));
        array_push($commandesEnPanier, $commandeProduit);
    }
}


include 'views/panier.php';

?>