<?php
require 'models/articles.php';
require 'models/users.php';
if(empty($_SESSION['id']) || checkUserRole($_SESSION['id']) >= 3){
    header("Location: ".ROOT_PATH);
    exit();
}

$consoles = getAllFromConsoles();
$genres = getAllFromGenres();
$limite_ages = getAllFromLimite_ages();
$multijoueurs = getAllFromMultijoueurs();

if(REQ_TYPE_ID){
    $article = getJeuByNom(REQ_TYPE_ID);
}
else {
    header("Location: ".ROOT_PATH."admin_article");
    exit();
}
if(!$article){
    http_response_code(404);
    include 'views/404.php';
    exit();
}

if (!empty($_POST) && !empty($_POST['nom']) && !empty($_POST['prix'])){

    if(isset($_FILES["image"])) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "public/images/".$_FILES["image"]["name"]);
        $imagePath = "public/images/".$_FILES["image"]["name"];
    }

    updateJeu($article['ID'], $_POST['nom'], $_POST['prix'], $_POST['consoleID'], $_POST['genreID'], $_POST['limite_ageID'], $_POST['multijoueurID'], $imagePath, $_POST['description']);
    $_SESSION['message'] = 'L\'article '.$article['nom'].' a bien été mis à jour';
    header("Location: ".ROOT_PATH."admin_article");
    exit();
}

else if(!empty($_POST['nom']) || !empty($_POST['prix'])){
    $_SESSION['error'] = "Le nom et le prix sont des champs obligatoire !";
}


include 'views/article_edit.php';
?>
