<?php ob_start();
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
       
        <li class="nav-item">
          <a class="nav-link" href="#"> Nouveautés </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produits
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php foreach ($tabCat as $cat) { ?>
            <li><a class="dropdown-item" href="index.php?id=<?= $cat->getId_cat(); ?>"><?= ucfirst($cat->getNom_cat()); ?></a></li>
            <?php } ?>
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pièces de la maison
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php foreach ($tabCat as $cat) { ?>
            <li><a class="dropdown-item" href="index.php?id=<?= $cat->getId_cat(); ?>"><?= ucfirst($cat->getNom_cat()); ?></a></li>
            <?php } ?>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <div class="mt-5 mb-5 text-center">
        <h1>Les nouvelles collections Meubles et Décoration
        </h1>
        <h3>Inspirées des grandes tendances déco 2021</h3>
        <h6 class="mt-2 text-secondary">« Nous avons eu à cœur de donner de l’âme aux maisons, en vous proposant des collections toujours plus stylées, généreuses et responsables ».<br/> Géraldine Florin, Directrice Artistique</h6>
    </div>
    <div id="carouselExampleControls" class="carousel slide mt-5 mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/images/tendance1.jpg" class="d-block w-100 ">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tendance2.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tendance3.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tendance4.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tendance5.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tendance6.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tendance7.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tendance8.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tendance9.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="./assets/images/tendance10.jpg" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--end carrousel-->
    <div class="row mt-5">
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($objets as $objet) { ?>

                    <div class="col-12">
                        <div class="card">
                            <img src="./assets/images/<?= $objet->getImage(); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $objet->getMarque(); ?> <?= $objet->getIntitule(); ?></h5>
                                <p class="card-text"><?= $objet->getDescription(); ?></p>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        catégorie
                                        <span class="badge bg-secondary rounded-pill"><?= $objet->getCategorie()->getNom_cat(); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        prix
                                        <span class="badge bg-secondary rounded-pill"><?= $objet->getPrix(); ?> €</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        nombre d'objet en stock
                                        <span class="badge bg-secondary rounded-pill"><?= $objet->getQuantite(); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <form action="index.php?action=checkout" method="post">
                                            <input type="hidden" name="marque" value="<?= $objet->getMarque(); ?>">
                                            <input type="hidden" name="intitule" value="<?= $objet->getIntitule(); ?>">
                                            <input type="hidden" name="image" value="<?= $objet->getImage(); ?>">
                                            <input type="hidden" name="prix" value="<?= $objet->getPrix(); ?>">
                                            <?php if ($objet->getQuantite() > 0) { ?>
                                                <button type="submit" name="envoi" class="btn btn-success">Acheter</button>
                                                <span class="badge text-success">en stock</span>
                                            <?php }else{ ?>
                                        </form>
                                            <a href="index.php?action=order&id=<?= $objet->getId_obj(); ?>"class="btn btn-warning">Commander</a>
                                            <span class="badge text-warning">rupture temporaire</span>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!--end cards-->
    </div>

    <?php
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
    ?>