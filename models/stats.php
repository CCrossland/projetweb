<?php

require_once 'models/db.php';

function getTotalRevenus()
{
    $reponse = getDB()->prepare('SELECT SUM(total) FROM commande');
    $totalRevenu = $reponse->fetch();
    $reponse->closeCursor();
    return $totalRevenu;
}

function getPurchaseAmountForProduit()
{
    $reponse = getDB()->prepare('SELECT p.nom, cp.produitID, COUNT(cp.produitID) AS compte FROM commande_produit AS cp JOIN produit AS p ON p.ID = cp.produitID GROUP BY produitID ORDER BY compt DESC');
    $amount = $reponse->fetchAll();
    $reponse->closeCursor();
    return $amount;
}

function getAmountOfCustomers()
{
    $reponse = getDB()->prepare('SELECT COUNT(*) FROM utilisateur WHERE roleID = 3');
    $amount = $reponse->fetchAll();
    $reponse->closeCursor();
    return $amount;
}

function getAmountOfCommandes()
{
    $reponse = getDB()->prepare('SELECT COUNT(*) FROM commande');
    $amount = $reponse->fetchAll();
    $reponse->closeCursor();
    return $amount;
}

// function getAllCommandeByUserID($id)
// {
//     $reponse = getDB()->prepare('SELECT * FROM commande WHERE utilisateurID = :id ORDER BY ID ASC');
//     $reponse->execute([':id' => $id]);
//     $commandes = $reponse->fetchAll();
//     $reponse->closeCursor();
//     return $commandes;
// }

// function createCommande($id, $total)
// {
//     $date = date('Y-m-d H:i:s');
//     $reponse = getDB()->prepare('INSERT INTO commande SET utilisateurID = :utilisateurID, statutCommandeID = :statutCommandeID, total = :total, date = :date');
//     $reponse->execute([':utilisateurID' => $id, ':statutCommandeID' => 1, ':total' => $total, ':date' => $date]);
//     $reponse->closeCursor();
// }

// function getLastIdInserted($id)
// {
//     $reponse = getDB()->prepare('SELECT MAX(ID) FROM commande WHERE utilisateurID = :id');
//     $reponse->execute([':id' => $id]);
//     $lastInsertID = $reponse->fetch();
//     $reponse->closeCursor();
//     return $lastInsertID[0];
// }

// function createCommandeProduit($idCommande, $idProduit, $prix)
// {
//     $reponse = getDB()->prepare('INSERT INTO commande_produit SET commandeID = :commandeID, produitID = :produitID, prix = :prix');
//     $reponse->execute([':commandeID' => $idCommande, ':produitID' => $idProduit, ':prix' => $prix]);
//     $reponse->closeCursor();
// }

// function getProduitInfo($userid, $cpid, $productid)
// {
//     $reponse = getDB()->prepare('SELECT p.ID AS produitID, p.nom AS produitNom, p.image AS produitImage, p.description AS produitDescription, cp.commandeID AS commandeID, cp.prix AS prix, c.utilisateurID AS userID, c.statutCommandeID AS statut, c.total AS total FROM produit AS p JOIN commande_produit AS cp ON p.ID = cp.produitID JOIN commande AS c ON cp.commandeID = c.ID WHERE c.utilisateurID = :userid AND cp.ID = :cpid AND p.ID = :productid');
//     $reponse->execute([':userid' => $userid, ':cpid' => $cpid, ':productid' => $productid,]);
//     $article = $reponse->fetch();
//     $reponse->closeCursor();
//     return $article;
// }

?>