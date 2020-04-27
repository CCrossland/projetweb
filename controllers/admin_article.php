<?php
require 'models/articles.php';
require 'models/users.php';

if(empty($_SESSION['id'])  || checkUserRole($_SESSION['id']) >= 3){
    header("Location: ".ROOT_PATH);
    exit();
}

if(REQ_TYPE_ID == 'add' && empty(REQ_ACTION))
{
    $consoles = getAllFromConsoles();
    $genres = getAllFromGenres();
    $limite_ages = getAllFromLimite_ages();
    $multijoueurs = getAllFromMultijoueurs();

    $imagePath="";

    if(!empty($_POST)) {
        if(!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['consoleID']) && !empty($_POST['genreID']) && !empty($_POST['limite_ageID']) && !empty($_POST['multijoueurID'])){

            if(checkJeuDoesntExist($_POST['nom']) == true)
            {
                if (!empty($_FILES['image']['name'])) {

                    $target_dir = "public/images/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    
                    //Check if image file is a actual image or fake image
                    if (isset($_FILES["image"])) {
                        $check = getimagesize($_FILES["image"]["tmp_name"]);
                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                            $_SESSION['error'] = "l'image ne convient pas, choissisez en une autre";
                            $uploadOk = 0;
                        }
                    }

                    // Check if file already exists
                    if (file_exists($target_file)) {
                        $imagePath = $target_file;
                        $uploadOk = 0;
                        $fileOk = 1;
                    }

                    //vérifie la taille du fichier
                    if ($_FILES["image"]["size"] > 5000000) {
                        $_SESSION['error'] = "Le fichier de l'image est trop gros.";
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        $_SESSION['error'] = "Seuls les formats JPG, JPEG, PNG et GIF sont acceptés.";
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        if($fileOk != 1){
                            $imagePath = $target_dir."no_image.jpg";
                        }

                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            $imagePath = $target_file;
                        } else {
                            $_SESSION['error'] = "Il y a eu une erreur lors de l'upload de l'image veuillez rééssayer avec une autre image";
                            $imagePath = $target_dir."no_image.jpg";
                        }
                    }
                }else{
                $_SESSION['error'] = "Pas d'image sélectionnée, l'image par défaut est utilisée";
                $imagePath = "public/images/no_image.jpg";
                }

                $article = createJeu($_POST['nom'], $_POST['prix'], $_POST['consoleID'], $_POST['genreID'], $_POST['limite_ageID'], $_POST['multijoueurID'], $imagePath, $_POST['description'], str_replace("watch?v=", "embed/", $_POST['video']));
                $_SESSION['message'] = "Le jeu ".$_POST['nom']." a été ajouté avec succés";
                header('Location: '.ROOT_PATH.'admin_article');
                exit();
            }
            else
            {
                $_SESSION['error'] = "Le jeu ".$_POST['nom']." existe déjà...";           
            }
        }
        else
        {
            $_SESSION['error'] = "Les champs Nom, Prix et Catégorie sont obligatoire !";
        }
    }
    include 'views/article_add.php';
}
else if(empty(REQ_TYPE_ID))
{
    $articles = getAllFromArticles();

    include 'views/admin_article.php';
}
else{
    header("Location: ".ROOT_PATH);
    exit();
}
