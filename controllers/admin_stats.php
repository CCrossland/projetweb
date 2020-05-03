<?php

require 'models/users.php';

if(empty($_SESSION['id'])  || checkUserRole($_SESSION['id']) >= 3){
    header("Location: ".ROOT_PATH);
    exit();
}

include 'views/admin_stats.php';

?>