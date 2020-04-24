<?php
require 'models/users.php';

function isValidUser($login, $password) {
    $user = getUserByLogin($login);
    // Ici on va vérifier si le login/pass est bon
    if($user && password_verify($password, $user['password'] ))
    {
        return $user;
    }
}

if(!empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}
if(!empty($_POST)) {
    if(!empty($_POST['login']) && !empty($_POST['password']))
    {
        
        $user = isValidUser($_POST['login'], $_POST['password']);

        if($user)
        {
            //Authentification OK
            $_SESSION['id'] = $user['ID'];
            if (!empty($_SESSION['panier'])){
            }else{
                $_SESSION['panier'] = array(); 
                $_SESSION['articleBooked'] = 0;
            }
            $_SESSION['message'] = "Bienvenue ".$user['login'];
            
            header("Location: ".ROOT_PATH);
            exit();
        }
        else
        {
            //Authentification NOK
            $_SESSION['error'] =  "Mauvais Login/Password";
        }
    }
    else
    {
        //Ici on va prévenir l'utilisateur qu'il manque quelque chose
        $_SESSION['error'] = "Tu as oublié d'encoder quelque chose...";
    }
}
include 'views/login.php';
?>