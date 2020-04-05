<?php
require_once 'models/db.php';

function getUserById($ID) {
    $reponse = getDB()->prepare('SELECT * FROM UTILISATEUR WHERE ID = :ID');
    $reponse->execute([':ID' => $ID]);
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

function setUser($ID, $login, $mail, $password, $rue = "", $numero = "", $cp = "", $localite = "") {
    $user = getUserById($ID);
    $reponse = getDB()->prepare('UPDATE UTILISATEUR SET login = :login, mail = :mail, password = :password, rue = :rue, numero = :numero, cp = :cp, localite = :localite WHERE ID = :ID');
    if($password){
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
        $password = $user['password'];
    }
    $reponse->execute([':ID' => $ID, ':login' => $login,':mail' => $mail,':password' => $password, ':rue' => $rue, ':numero' => $numero, ':cp' => $cp, ':localite' => $localite]);
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

function getAllFromUser(){
    $reponse = getDB()->query('SELECT * FROM UTILISATEUR');
    $users = $reponse->fetchAll();
    $reponse->closeCursor(); // Termine le traitement de la requête
    return $users;
}

function createUser($login, $password, $mail, $nom, $prenom) {
    $reponse = getDB()->prepare('INSERT INTO UTILISATEUR SET login = :login, password = :password, mail = :mail, nom = :nom, prenom = :prenom, roleID = :roleID');
    $reponse->execute([':login' => $login, ':password' => password_hash($password, PASSWORD_DEFAULT), ':mail' => $mail, ':nom' => $nom, ':prenom' => $prenom, ':roleID' => 3]);
    $reponse->closeCursor(); // Termine le traitement de la requête
}

function deleteUser($login){
    $reponse = getDB()->prepare("DELETE FROM UTILISATEUR WHERE login = :login");
    $reponse->execute([':login' => $login]);
    $reponse->closeCursor();
}

function checkUserRole($ID){
    $user = getUserById($ID);
    return $user['roleID'];
}

?>
