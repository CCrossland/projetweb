<?php

require 'models/articles.php';
require 'models/stats.php';
require 'models/users.php';

if(empty($_SESSION['id'])  || checkUserRole($_SESSION['id']) >= 3){
    header("Location: ".ROOT_PATH);
    exit();
}

$articles = getPurchaseAmountForProduit();
$dataPoints = array();

foreach($articles as $article)
{
    $tempArray = array('name' => $article['nom'], 'y' => $article['amount']);
    array_push($dataPoints, $tempArray);
}

$chiffreClients = getPurchaseAmountForClients();
$dataPoints2 = array();

foreach($chiffreClients as $chiffreClient)
{
    $tempArray = array('name' => $chiffreClient['utilisateurPrenom'], 'y' => $chiffreClient['totalParUtilisateur']);
    array_push($dataPoints2, $tempArray);
}



include 'views/admin_stats.php';

?>