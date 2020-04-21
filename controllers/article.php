<?php
require 'models/articles.php';

$consolesTemp = getAllFromConsoles();
$consolesNoms = array();

foreach($consolesTemp as $console)
{
    array_push($consolesNoms, $console['nom']);
}

if (!REQ_TYPE_ID) {
    $articles = getAllFromArticles();

    $consoles = array();
    foreach ($consolesTemp as $consoleTemp)
    {
        array_push($consoles, array('ID' =>  $consoleTemp['ID'], 'nom' => $consoleTemp['nom'], 'direction' => $consoleTemp['nom'], 'active' => ''));
    }

    $genres = getAllFromGenres();
    include 'views/articles.php';

} else if (in_array(REQ_TYPE_ID, $consolesNoms)) {

    $articles = getAllProduitByConsoleName(REQ_TYPE_ID);
    $activeConsole = REQ_TYPE_ID;

    $consoles = array();
    foreach ($consolesTemp as $consoleTemp)
    {
        if ($consoleTemp['nom'] == REQ_TYPE_ID){
            array_push($consoles, array('ID' =>  $consoleTemp['ID'], 'nom' => $consoleTemp['nom'], 'direction' => '', 'active' => 'active'));
        }else{
            array_push($consoles, array('ID' =>  $consoleTemp['ID'], 'nom' => $consoleTemp['nom'], 'direction' => $consoleTemp['nom'], 'active' => ''));
        }
    }

    $genres = getAllFromGenres();
    include 'views/articles.php';

} else {
    $article = getJeuByNom(REQ_TYPE_ID);
    $article['nom'] = str_replace("_", " ", $article['nom']);

    include 'views/article.php';
}

?>

