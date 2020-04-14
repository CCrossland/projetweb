<?php

require 'models/users.php';
require 'models/book.php';
require 'models/articles.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}
if(REQ_TYPE_ID)
{
    $commandes = getAllCommandeByUserID($_SESSION['id']);
    $articles = array();

    foreach($commandes as $commande)
    {
        $commandesProduitTemp = getAllCommandeProduitByCommandeId($commande['ID']);
        foreach($commandesProduitTemp as $commandeProduit)
        {
            array_push($articles, getProduitInfo($_SESSION['id'], $commandeProduit['ID'], $commandeProduit['produitID']));
        }
    }
}

include 'views/user_commandes.php';
