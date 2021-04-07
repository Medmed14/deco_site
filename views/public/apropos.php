<?php ob_start();?>

<div class="container">
</br>
<h1 class="mt-5 mb-5 text-center">Mais oui au fait, nous ne nous sommes pas présentés ...</h1></br></br>

<p> Deco'R est une startup Bordelaise, spécialisée dans la décoration pour toute la maison. Notre vision est simple, moins e produits que les géants de la décoration, mais plus de qualité et des prix justes.</p></br>

<h5 class="mt-5 text-center fw-bold"> Comment ca des prix justes?!</h5>

<p class="mt-5">Et oui, malheureusement nous avons remarqué que nos concurrents n'appliquaient pas toujours des prix cohérents... Des commodes fabriquées en Chine vendues au prix de l'artisanat local... Non seulement ce n'est pas éthique, mais tout cela n'est pas très écologique non plus !</p></br>

<h5 class="mt-5 fw-bold text-center">Aller ZOU! nous on envoie tout valser...</h5>

<p class="mt-5">Chez Deco'R on a voulu vous proposer du joli, du tendance, du pas trop cher, et du local! Oui oui rien que ca, par local entendons nous bien , on c'est autorisés à aller jusqu'au continent Européen, car on ne trouve malheureusement pas tout dans notre cher pays... Mais qui sait peut être un jour nous serons a même de vous proposer des meubles 100% Made in France sans négliger le choix!</p></br>

<h5 class="mt-5 fw-bold text-center">En espérant que vous trouverez votre bonheur chez nous...</h5>

<p class="mt-5">Nous vous souhaitons une bonne exploration, n'hésitez pas à nous contacter via l'onglet contact pour toute demande complémentaire, nos équipes se ferons un plaisir d'y répondre au plus vite ! </p></br>

<p class="text-center mt-5">A très bientôt</p>
<p class="text-end mt-5 mb-5">toute l'équipe de Deco'r</p>

</div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?> 