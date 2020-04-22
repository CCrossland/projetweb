<?php

require_once 'models/db.php';

function getAllBooks()
{
    $reponse = getDB()->query('SELECT u.login AS login, c.ID AS commandeID, c.total AS total, c.date AS commandeDate, COUNT(cp.ID) as countProduit
    FROM utilisateur AS u
    JOIN commande AS c
    ON u.ID = c.utilisateurID
    JOIN commande_produit AS cp
    ON cp.commandeID = c.ID
    GROUP BY c.ID');
    $commandes = $reponse->fetchAll();
    $reponse->closeCursor();
    return $commandes;
}

function getAllCommandeByUserID($id)
{
    $reponse = getDB()->prepare('SELECT * FROM commande WHERE utilisateurID = :id ORDER BY ID ASC');
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

function createCommande($id, $total)
{
    $date = date('Y-m-d H:i:s');
    $reponse = getDB()->prepare('INSERT INTO commande SET utilisateurID = :utilisateurID, statutCommandeID = :statutCommandeID, total = :total, date = :date');
    $reponse->execute([':utilisateurID' => $id, ':statutCommandeID' => 1, ':total' => $total, ':date' => $date]);
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

function getProduitInfo($userid, $cpid, $productid)
{
    $reponse = getDB()->prepare('SELECT p.ID AS produitID, p.nom AS produitNom, p.image AS produitImage, p.description AS produitDescription, cp.commandeID AS commandeID, cp.prix AS prix, c.utilisateurID AS userID, c.statutCommandeID AS statut, c.total AS total FROM produit AS p JOIN commande_produit AS cp ON p.ID = cp.produitID JOIN commande AS c ON cp.commandeID = c.ID WHERE c.utilisateurID = :userid AND cp.ID = :cpid AND p.ID = :productid');
    $reponse->execute([':userid' => $userid, ':cpid' => $cpid, ':productid' => $productid,]);
    $article = $reponse->fetch();
    $reponse->closeCursor();
    return $article;
}

?>