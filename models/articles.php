<?php
require_once 'models/db.php';

function getAllFromArticles()
{
    $reponse = getDB()->query('SELECT p.ID AS ID, p.nom AS nom, prix, consoleID, genreID, limite_ageID, multijoueurID, image, description, g.nom AS genreNom, c.nom AS consoleNom, m.nom as multijoueur, la.nom AS limiteAge FROM produit AS p JOIN genre AS g ON p.genreID = g.ID JOIN console AS c ON p.consoleID = c.ID JOIN limite_age AS la ON la.ID = p.limite_ageID JOIN multijoueur AS m ON m.ID = p.multijoueurID WHERE actif = 1');
    $articles = $reponse->fetchAll();
    $reponse->closeCursor();
    return $articles;
}

function getJeuByNom($nom) 
{
    $articles = getAllFromArticles();
    foreach ($articles as $article) {
        if (strtolower($nom) == strtolower($article['nom'])) {
            return $article;
        }
    }
}

function getJeuById($id)
{
    $reponse = getDB()->prepare('SELECT p.ID AS ID, p.nom AS nom, prix, consoleID, genreID, limite_ageID, multijoueurID, image, description, g.nom AS genreNom, c.nom AS consoleNom, m.nom as multijoueur, la.nom AS limiteAge FROM produit AS p JOIN genre AS g ON p.genreID = g.ID JOIN console AS c ON p.consoleID = c.ID JOIN limite_age AS la ON la.ID = p.limite_ageID JOIN multijoueur AS m ON m.ID = p.multijoueurID WHERE p.ID = :id AND actif = 1');
    $reponse->execute([':id' => $id]);
    $article = $reponse->fetch();
    $reponse->closeCursor(); 
    return $article;
}

function updateJeu($id, $nom, $prix, $consoleID = "", $genreID = "", $limite_ageID = "", $multijoueurID = "", $image = "", $description = "")
{
    $article = getJeuById($id);
    $reponse = getDB()->prepare('UPDATE Produit SET nom = :nom, prix = :prix, consoleID = :consoleID, genreID = :genreID, limite_ageID = :limite_ageID, multijoueurID = :multijoueurID, image = :image, description = :description WHERE ID = :id');
    $reponse->execute([':id' => $id, ':nom' => str_replace(" ", "_", $nom), ':prix' => $prix, ':consoleID' => $consoleID, ':genreID' => $genreID, ':limite_ageID' => $limite_ageID, ':multijoueurID' => $multijoueurID, ':image' => $image, ':description' => $description]);
    $reponse->closeCursor(); 
}

function checkJeuExists($nom)
{
    $article = getJeuByNom($nom);
    if (!$article) {
        return true;
    }
}

function createJeu($nom, $prix, $consoleID = "", $genreID = "", $limite_ageID = "", $multijoueurID = "", $image = "", $description = "")
{
    $reponse = getDB()->prepare('INSERT INTO Produit SET nom = :nom, prix = :prix, consoleID = :consoleID, genreID = :genreID, limite_ageID = :limite_ageID, multijoueurID = :multijoueurID, image = :image, description = :description');
    $reponse->execute([':nom' => str_replace(" ", "_", $nom), ':prix' => $prix, ':consoleID' => $consoleID, ':genreID' => $genreID, ':limite_ageID' => $limite_ageID, ':multijoueurID' => $multijoueurID, ':image' => $image, ':description' => $description]);
    $reponse->closeCursor(); 
}

function deleteJeu($id)
{
    //$reponse = getDB()->prepare("DELETE FROM Produit WHERE nom = :nom");
    $reponse = getDB()->prepare("UPDATE Produit SET actif = 0 WHERE ID = :ID");
    $reponse->execute([':ID' => $id]);
    $reponse->closeCursor();
}


// Console

function getAllFromConsoles()
{
    $reponse = getDB()->query('SELECT * FROM console');
    $consoles = $reponse->fetchAll();
    $reponse->closeCursor(); 
    return $consoles;
}

function getConsoleByID($id)
{
    $consoles = getAllFromConsoles();
    foreach ($consoles as $console) {
        if ($id == $console['ID']) {
            return $console;
        }
    }
}

function getAllProduitByConsoleName($nom)
{
    $reponse = getDB()->prepare('SELECT p.ID AS ID, p.nom AS nom, prix, consoleID, genreID, limite_ageID, multijoueurID, image, description, g.nom AS genreNom, c.nom AS consoleNom FROM produit AS p JOIN genre AS g ON p.genreID = g.ID JOIN console AS c ON p.consoleID = c.ID WHERE actif = 1 AND c.nom = :nom');;
    $reponse->execute([':nom' => $nom]);
    $article = $reponse->fetchAll();
    $reponse->closeCursor();
    return $article;
}


// Genre


function getAllFromGenres()
{
    $reponse = getDB()->query('SELECT * FROM genre');
    $genres = $reponse->fetchAll();
    $reponse->closeCursor(); 
    return $genres;
}

function getGenreByID($id)
{
    $genres = getAllFromGenres();
    foreach ($genres as $genre) {
        if ($id == $genre['ID']) {
            return $genre;
        }
    }
}

function getProduitGenre($id)
{
    $reponse = getDB()->query('SELECT genreID FROM Produit WHERE ID = :id');;
    $reponse->execute([':id' => $id]);
    $article = $reponse->fetch();
    $reponse->closeCursor();
    return $article;
}

function getAllProduitByGenreName($nom)
{
    $reponse = getDB()->prepare('SELECT p.ID AS ID, p.nom AS nom, prix, consoleID, genreID, limite_ageID, multijoueurID, image, description, g.nom AS genreNom, c.nom AS consoleNom FROM produit AS p JOIN genre AS g ON p.genreID = g.ID JOIN console AS c ON p.consoleID = c.ID WHERE actif = 1 AND g.nom = :nom');;
    $reponse->execute([':nom' => $nom]);
    $article = $reponse->fetchAll();
    $reponse->closeCursor();
    return $article;
}


// Limite_age


function getAllFromLimite_ages()
{
    $reponse = getDB()->query('SELECT * FROM limite_age');
    $limite_ages = $reponse->fetchAll();
    $reponse->closeCursor(); 
    return $limite_ages;
}

function getLimite_ageByID($id)
{
    $limite_ages = getAllFromLimite_ages();
    foreach ($limite_ages as $limite_age) {
        if ($id == $limite_age['ID']) {
            return $limite_age;
        }
    }
}

function getProduitLimite_age($id)
{
    $reponse = getDB()->query('SELECT limite_ageID FROM Produit WHERE ID = :id');;
    $reponse->execute([':id' => $id]);
    $article = $reponse->fetch();
    $reponse->closeCursor();
    return $article;
}

// Multijoueur


function getAllFromMultijoueurs()
{
    $reponse = getDB()->query('SELECT * FROM multijoueur');
    $multijoueurs = $reponse->fetchAll();
    $reponse->closeCursor(); 
    return $multijoueurs;
}

function getMultijoueurByID($id)
{
    $multijoueurs = getAllFromMultijoueurs();
    foreach ($multijoueurs as $multijoueur) {
        if ($id == $multijoueur['ID']) {
            return $multijoueur;
        }
    }
}

function getProduitMultijoueur($id)
{
    $reponse = getDB()->query('SELECT multijoueurID FROM Produit WHERE ID = :id');;
    $reponse->execute([':id' => $id]);
    $article = $reponse->fetch();
    $reponse->closeCursor();
    return $article;
}



?>
