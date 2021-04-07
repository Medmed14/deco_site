<?php ob_start();?>

<p> error 404 </p>


<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>