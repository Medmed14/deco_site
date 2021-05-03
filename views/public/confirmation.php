<?php ob_start();?>

<div class="container">
<h2 class="text-center mt-5 mb-5 ">Confirmation de commande</h2>
<h4 class="text-center mb-5"> Madame, Monsieur, nous vous remercions pour votre achat sur notre site,<br/> un email de confirmation vous a été envoyé sur votre boîte mail.</h4> 
<p class="text-center mt-5">A très bientôt sur Deco'R.com </p>
</div>
</div>

<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?> 