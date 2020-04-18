<?php
require 'models/users.php';

if(!empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}

if(!empty($_POST)) {
    if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirmpassword']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
    {
        if($_POST['password'] != $_POST['confirmpassword']){
            $_SESSION['error'] = "Votre mot de passe et votre mot de passe de confirmation ne correspondent pas...";
        }else if (!checkUserExist($_POST['login'])){
            $_SESSION['error'] = "Le login ".$_POST['login']." existe déjà";
        }else{
            $user = createUser($_POST['login'], $_POST['password'], $_POST['mail'], $_POST['nom'], $_POST['prenom']);

            $user = getUserByLogin($_POST['login']);

            $_SESSION['id'] = $user['ID'];
            $_SESSION['panier'] = array();
            $_SESSION['message'] = "Bienvenue ".$user['login'];
            $_SESSION['articleBooked'] = 0;
            header("Location: ".ROOT_PATH."index");
            exit();
        }
    }
    else
    {
        $_SESSION['error'] = "Tu as oublié d'encoder quelque chose...";
    }
}

include 'views/signup.php';
?>
