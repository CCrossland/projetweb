<?php
require 'models/articles.php';
require 'models/stats.php';
require 'models/users.php';

if(empty($_SESSION['id']) || checkUserRole($_SESSION['id']) >= 3){
    header("Location: ".ROOT_PATH);
    exit();
}

$chiffreClients = getPurchaseAmountForClients();
$dataPoints = array();

foreach($chiffreClients as $chiffreClient)
{
    $tempArray = array($chiffreClient['utilisateurLogin'], $chiffreClient['totalParUtilisateur']);
    array_push($dataPoints, $tempArray);
}

echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
?>