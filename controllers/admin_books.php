<?php

require 'models/users.php';
require 'models/book.php';
require 'models/articles.php';

if(empty($_SESSION['id']) && checkUserRole($_SESSION['id'] <= 2)){
    header("Location: ".ROOT_PATH);
    exit();
}

$commandes = getAllBooks();


include 'views/admin_books.php';
