<?php

require 'models/articles.php';
require 'models/book.php';

if(empty($_SESSION['id']))
{
    header("Location: ".ROOT_PATH);
    exit();
}

if(!empty($_SESSION['panier']))
{   
    $articles=array();

    createCommande($_SESSION['id']);

    $idcommande = getLastIdInserted($_SESSION['id']);

    foreach($_SESSION['panier'] as $articleEnPanier)
    {
        array_push($articles, getJeuById($articleEnPanier));
    }

    $total=0;

    foreach($articles as $article)
    {
        createCommandeProduit($idcommande, $article['ID'], $article['prix']);
        $total+=$article['prix'];
    }

    unset($_SESSION['panier']);
    $_SESSION['panier']=[];

}
else
{
    header("Location: ".ROOT_PATH);
    $_SESSION['message']='Votre panier est vide, vous avez été redirigé';
    exit();
}

include 'views/commande.php';
?>