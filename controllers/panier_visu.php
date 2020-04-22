<?php
require 'models/articles.php';
require 'models/users.php';
require 'models/book.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}

$articles = array();
$total=0;

foreach($_SESSION['panier'] as $articleEnPanier)
{
    array_push($articles, getJeuById($articleEnPanier));
}

foreach($articles as $article)
{
    $total += $article['prix'];
}

include 'views/panier_visu.php';

?>