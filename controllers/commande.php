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
    $total=0;

    foreach($_SESSION['panier'] as $articleEnPanier)
    {
        array_push($articles, getJeuById($articleEnPanier));
    }

    foreach($articles as $article)
    {
        $total+=$article['prix'];
    }

    createCommande($_SESSION['id'], $total);
    $idcommande = getLastIdInserted($_SESSION['id']);

    foreach($articles as $article)
    {
        createCommandeProduit($idcommande, $article['ID'], $article['prix']);
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

$_SESSION['articleBooked'] = 0;

include 'views/commande.php';
?>