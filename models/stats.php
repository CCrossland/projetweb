<?php

require_once 'models/db.php';

function getTotalRevenus()
{
    $reponse = getDB()->query('SELECT SUM(total) FROM commande');
    $totalRevenu = $reponse->fetch();
    $reponse->closeCursor();
    return $totalRevenu;
}

function getPurchaseAmountForProduit()
{
    $reponse = getDB()->query('SELECT p.nom AS nom, cp.produitID AS produitID, COUNT(cp.produitID) AS amount FROM commande_produit AS cp JOIN produit AS p ON p.ID = cp.produitID GROUP BY produitID');
    
    $amount = $reponse->fetchAll();
    $reponse->closeCursor();
    return $amount;
}

function getPurchaseAmountForClients()
{
    
    $reponse = getDB()->query('SELECT SUM(c.total) AS totalParUtilisateur, u.login AS utilisateurLogin FROM commande AS c JOIN utilisateur AS u ON c.utilisateurID = u.ID GROUP BY utilisateurID');
    $amount = $reponse->fetchAll();
    $reponse->closeCursor();
    return $amount;
}

function getAmountOfCustomers()
{
    $reponse = getDB()->query('SELECT COUNT(*) FROM utilisateur WHERE roleID = 3');
    $amount = $reponse->fetchAll();
    $reponse->closeCursor();
    return $amount;
}

function getAmountOfCommandes()
{
    $reponse = getDB()->query('SELECT COUNT(*) FROM commande');
    $amount = $reponse->fetchAll();
    $reponse->closeCursor();
    return $amount;
}


?>