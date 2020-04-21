<?php
require 'models/articles.php';
require 'models/users.php';
if(empty($_SESSION['id']) || checkUserRole($_SESSION['id']) >= 3){
    header("Location: ".ROOT_PATH);
    exit();
}
if(REQ_TYPE_ID){
    $article = getJeuByNom(REQ_TYPE_ID);
}
else {
    header("Location: ".ROOT_PATH."admin_article");
    exit();
}
if($article){
    deleteJeu($article['ID']);
    $_SESSION['message'] = "L'article ".$article['nom']." a bien été supprimé";
}
else
{    http_response_code(404);
    include 'views/404.php';
    exit();
}
header("Location: ".ROOT_PATH."admin_article");
exit();
?>