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
    $tempArray = array(str_replace("_"," ",$article['nom']), $article['amount']);
    array_push($dataPoints, $tempArray);
}

echo json_encode($dataPoints, JSON_NUMERIC_CHECK);

?>