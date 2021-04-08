<?php ob_start(); ?>

<div class="container">

  <h1 class="text-center mt-3 mb-5">Récaputulatif de votre commande</h1>
  <div class="col-md-8 offset-2 text-center">
    <img src="./assets/images/<?= $image; ?>" alt="..." width="400">
  </div>
  <div class="col-md-8 offset-2 text-center">
    <div class="card-body">
      <h5 class="card-title"><?= $marque; ?>-<?= $intitule; ?></h5>
      <p class="card-text">Prix: <?= $prix; ?> €</p>
    </div>
    <div class="row">

      <div class="col-8">
        
        <form class="col-12 offset-3 mt-4" action="" method="post">

          <label for="email">Email * </label>
          <input id="email" type="email" class="form-control" placeholder="votre email svp">

          <label class="mt-4" for="quantite ">Quantité *</label>
          <input id="quantite" type="number" class="form-control" min="1" value="1" max="<?= $nb; ?>">
          <!-- on envoie les infos au back-end -->
          <input type="hidden" id="ref" value="<?= $id; ?>">
          <input type="hidden" id="intitule" value="<?= $intitule; ?>">
          <input type="hidden" id="marque" value="<?= $marque; ?>">
          <input type="hidden" id="prix" value="<?= $prix; ?>">
          <input type="hidden" id="nb" value="<?= $nb; ?>">

          <button id="checkout-button" class="btn btn-success col-12 mt-5 mb-5"> Valider votre achat </button>

        </form>
      </div>
    </div>
  </div>
  <div class="col-3">

  </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>