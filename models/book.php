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
    $reponse = getDB()->prepare('SELECT * FROM commande_Produit WHERE commandeID = :id');
    $reponse->execute([':id' => $id]);
    $article = $reponse->fetch();
    $reponse->closeCursor();
    return $article;
}

function createCommande($id)
{
    $reponse = getDB()->prepare('INSERT INTO commande SET utilisateurID = :utilisateurID, statutCommandeID = :statutCommandeID');
    $reponse->execute([':utilisateurID' => $id, ':statutCommandeID' => 1]);
    $reponse->closeCursor();
}

function getLastIdInserted($id)
{
    $reponse = getDB()->prepare('SELECT MAX(ID) FROM commande WHERE utilisateurID = :id');
    $reponse->execute([':id' => $id]);
    $lastInsertID = $reponse->fetch();
    $reponse->closeCursor();
    return $lastInsertID[0];
}

function createCommandeProduit($idCommande, $idProduit, $prix)
{
    $reponse = getDB()->prepare('INSERT INTO commande_produit SET commandeID = :commandeID, produitID = :produitID, prix = :prix');
    $reponse->execute([':commandeID' => $idCommande, ':produitID' => $idProduit, ':prix' => $prix]);
    $reponse->closeCursor();
}

?>