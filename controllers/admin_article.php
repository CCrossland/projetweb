<?php
require 'models/articles.php';
require 'models/users.php';

if(empty($_SESSION['id'])  || checkUserRole($_SESSION['id']) >= 3){
    header("Location: ".ROOT_PATH);
    exit();
}

$articles = getAllFromArticles();
include 'views/admin_article.php';

