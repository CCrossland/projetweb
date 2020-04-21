<?php
require 'models/articles.php';

$consoles = getAllFromConsoles();
$genres = getAllFromGenres();

include 'views/welcome.php';
?>
