<?php
require_once 'models/book.php';

array_push($_SESSION['panier'], REQ_TYPE_ID);

header('location: '.ROOT_PATH.'article');
?>