<?php ob_start();?>

<div class="container">
<h2 class="text-center mt-5 mb-5">Confirmation de commande</h2>
<p>Merci pour votre achat</p> 
</div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?> 