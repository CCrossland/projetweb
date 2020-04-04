<?php
require_once 'models/db.php';

function getUserById($id) {
    $reponse = getDB()->prepare('SELECT * FROM UTILISATEUR WHERE id = :id');
    $reponse->execute([':id' => $id]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function getUserByLogin($login) {
    $reponse = getDB()->prepare('SELECT * FROM UTILISATEUR WHERE login = :login');
    $reponse->execute([':login' => $login]);
    $user = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $user;
}

function setUser($id, $login, $mail, $password) {
    $user = getUserById($id);
    //C'est ici qu'on va faire l'update de l'utilisateur.
    $reponse = getDB()->prepare('UPDATE UTILISATEUR SET login = :login, mail = :mail, password = :password WHERE ID = :id');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['password'];
    }
    $reponse->execute([':id' => $id, ':mail' => $mail, ':password' => $password, ':login' => $login]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function checkUserExist($login){
    $user = getUserByLogin($login);

    if(!$user)
    {
        return true;
    }else{
        return false;
    }
}

function createUser($login, $password, $mail, $nom, $prenom) {
    $reponse = getDB()->prepare('INSERT INTO UTILISATEUR SET login = :login, password = :password, mail = :mail, nom = :nom, prenom = :prenom');
                $reponse->execute([':login' => $_POST['login'],':password' => password_hash($_POST['password'], PASSWORD_DEFAULT), ':mail' => $_POST['mail'], ':nom' => $_POST['nom'], ':prenom' => $_POST['prenom']]);
                $reponse->closeCursor(); // Termine le traitement de la requête
}

?>
