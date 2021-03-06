<?php

require 'models/users.php';
require 'models/book.php';
require 'models/articles.php';

if(empty($_SESSION['id']) && checkUserRole($_SESSION['id'] <= 2)){
    header("Location: ".ROOT_PATH);
    exit();
}

if (!REQ_TYPE_ID)
{
    $commandes = getAllBooks();
    include 'views/admin_commandes.php';
}else{
    $detailsCommande = getCommandeDetailsByCommandeID(REQ_TYPE_ID);
    include 'views/admin_commande.php';
}

