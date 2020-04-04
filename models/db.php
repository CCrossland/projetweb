<?php
function getDB() {
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=jeux_video_store;charset=utf8', ''.BDD_LOGIN.'', ''.BDD_MDP.'', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}

