<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="png" href="./assets/images/favicon.ico"/>
    <title>DeCo'R</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/templatePublic.css" >
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark col-12 pr-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="./assets/images/logo.png" alt="logo de l'entreprise Deco'r " width="80"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=apropos">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
                <input  class="barreRech offset-3 form-control text-center rounded-pill" type="search" name="search" id="search" placeholder="Rechecher un objet sur le site...">
                <button id="btnRech" type="submit" class="btn btn-outline-secondary rounded-pill" name="soumis"><i class="fas fa-search"></i></button>
            </form>
        </nav>
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
            <li><a class="dropdown-item" href=""></a></li>
            <?php } ?>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
    <main>
        
        <!-- on demande a afficher le contenu de l'accueil.php -->

        <?= $contenu; ?>

    </main>
    <footer>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3">
            <div class="container-fluid ">
                <a class="navbar-brand fs-4" href="index.php">DeCo'R</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class=" text nav-link active" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover" href="index.php?action=cgv">Conditions générales de vente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=contact">nous contacter</a>
                        </li>
                    </ul>
                </div >
                <p class="d-inline text-white mt-3">Suivez-nous sur les réseaux !</p>
            </div>
            
            <a href="https://www.instagram.com/?hl=fr"><i id="insta" class="d-inline fab fa-instagram text-white"></i></a>
            <a href="https://www.facebook.com/"><i id="facebook" class="d-inline fab fa-facebook text-white"></i></a>
            <a href="https://twitter.com/?lang=fr"><i id="tweeter" class="d-inline fab fa-twitter-square text-white"></i></a>
            <div id="foot" class="text-white text-center"><i class="fa fa-copyright" aria-hidden="true"> Copyright 2021</i></div>
        </nav>
    </footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./assets/js/scriptStripe.js"></script>
<script src="./assets/js/templatePublic.js"></script>


</body>
</html>
