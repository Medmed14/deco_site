<?php ob_start();

?>

<div class="container">
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
            <!---end carrousel-->
            <div class="row mt-2">
                <div class="col-8">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <?php foreach($objets as $objet){ ?>
                        
                        <div class="col-4">
                            <div class="card">
                                <img src="./assets/images/<?=$objet->getImage(); ?>" class="card-img-top"  alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$objet->getMarque(); ?> <?=$objet->getIntitule(); ?></h5>
                                    <p class="card-text"><?=$objet->getDescription(); ?></p>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        catégorie 
                                            <span class="badge bg-primary rounded-pill"><?=$objet->getCategorie()->getNom_cat(); ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        prix
                                            <span class="badge bg-primary rounded-pill"><?=$objet->getPrix(); ?> €</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        pièces en stock
                                            <span class="badge bg-primary rounded-pill"><?=$objet->getQuantite(); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!--end cards-->
                <div class="col-4">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
                        <input class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher...">
                        <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
                     </form>
                <div class="card">
                    <ul class="list-group list-group-flush">
                      <?php foreach($tabCat as $cat ){ ?>
                      <li class="list-group-item text-center">
                        <a class="btn text-center" href="index.php?id=<?=$cat->getId_cat();?>"><?=ucfirst($cat->getNom_cat());?></a>
                      </li>
                     <?php } ?>
                    </ul>
                </div> 
              </div>
          
    </div>
 
<?php 
    $contenu = ob_get_clean();
    require_once('./views/public/templatePublic.php');
?>