<?php

$key = array_search(REQ_TYPE_ID, $_SESSION['panier'], TRUE);

unset($_SESSION['panier'][$key]);

header('location: '.ROOT_PATH.'panier_visu');

$_SESSION['articleBooked']--;

?>