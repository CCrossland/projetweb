<?php

require_once 'models/db.php';

function getAllCommandeByUserID($id)
{
    $reponse = getDB()->prepare('SELECT * FROM commande WHERE utilisateurID = :id');
    $reponse->execute([':id' => $id]);
    $commandes = $reponse->fetchAll();
    $reponse->closeCursor();
    return $commandes;
}

function getAllCommandeProduitByCommandeId($id)
{
    $reponse = getDB()->prepare('SELECT * FROM commande_produit WHERE commandeID = :id');
    $reponse->execute([':id' => $id]);
    $commandesProduit = $reponse->fetchAll();
    $reponse->closeCursor();
    return $commandesProduit;
}

function getCommandeProduitByCommandeId($id)
{
    $reponse = getDB()->prepare('SELECT * FROM Commande_Produit WHERE commandeID = :id');
    $reponse->execute([':id' => $id]);
    $article = $reponse->fetch();
    $reponse->closeCursor();
    return $article;
}

?>