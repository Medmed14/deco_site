<?php ob_start();?>

<div id="corps404">
    <h1 id="title404">Oooops c'est le désert ici !</h1>
    <a href="index.php"><button id="btnRetour" class="btn btn-secondary" >Retourner à l'accueil du site</button></a>
    <img id="cactus1" src="./assets/images/page404/cactus.png" alt="image d'illustration d'un cactus" >
    <img id="cactus2" src="./assets/images/page404/cactus1.png" alt="image d'illustration d'un cactus" >
    <img id="plant" src="./assets/images/page404/plant1.png" alt="image d'illustration d'un cactus" >
    
</div>


<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>