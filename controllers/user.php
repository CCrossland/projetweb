<?php
require 'models/users.php';
if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}
if(REQ_TYPE_ID){
    $user = getUserByLogin(REQ_TYPE_ID);
}
else {
    $user = getUserById($_SESSION['id']);
    header("Location: ".ROOT_PATH."user/".$user['login']);
    exit();
}
if(!$user){
    http_response_code(404);
    include 'views/404.php';
    exit();
}

$email = $user['mail'];
$default = "https://blog.ramboll.com/fehmarnbelt/wp-content/themes/ramboll2/images/profile-img.jpg";
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=310";

include 'views/user.php';
?>
