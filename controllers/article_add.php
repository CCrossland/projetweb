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

$imagePath="";

if(!empty($_POST)) {
    if(!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['consoleID'])){

        if(checkJeuExists($_POST['nom']) == true)
        {
            if(isset($_FILES["image"])) {
                move_uploaded_file($_FILES["image"]["tmp_name"], "public/images/".$_FILES["image"]["name"]);
                $imagePath = "public/images/".$_FILES["image"]["name"];
            }

            $article = createJeu($_POST['nom'], $_POST['prix'], $_POST['consoleID'], $_POST['genreID'], $_POST['limite_ageID'], $_POST['multijoueurID'], $imagePath, $_POST['description']);
            $_SESSION['message'] = "L'article ".$_POST['nom']." ajouté avec succés";
            header('Location: '.ROOT_PATH.'admin_article');
            exit();
        }
        else
        {
            $_SESSION['error'] = "L'article ".$_POST['nom']." existe déjà...";           
        }
    }
    else
    {
        $_SESSION['error'] = "Les champs Nom, Prix et Catégorie sont obligatoire !";
    }
}
include 'views/article_add.php';
?>