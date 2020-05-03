<?php 
ob_start();

// include('includes/scriptstats.php');
?>

<div id="chartContainer"></div>
<br/>
<div id="chartContainer2"></div>

<?php
$title = "Statistiques";
$content = ob_get_clean();
include('includes/template.php');
?>