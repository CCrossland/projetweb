<?php 
ob_start();

include('includes/scriptstats.php');
?>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<br/>
<div id="chartContainer2" style="height: 370px; width: 100%;"></div>

<?php
$title = "Statistiques";
$content = ob_get_clean();
include('includes/template.php');
?>