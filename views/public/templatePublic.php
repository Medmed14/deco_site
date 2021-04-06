<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="png" href="./assets/images/favicon.ico"/>
    <title>DeCo'R</title>
    <link rel="stylesheet" href="./assets/css/templatePublic.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group mr-5">
                <input  class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher un objet sur le site...">
                <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
            </form>
        </nav>
    </header>
    <main>
        
        <!-- on demande a afficher le contenu de l'accueil.php -->

        <?= $contenu; ?>

    </main>
    <footer>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-5 pt-3 pb-3">
            <div class="container-fluid ">
                <a class="navbar-brand" href="index.php">DeCo'R</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Conditions générales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Politique de confidentialité</a>
                        </li>
                    </ul>
                </div >
            </div>
            <div class=" container text-white "><i class="fa fa-copyright" aria-hidden="true"> Copyright 2021</i></div>
        </nav>
    </footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="./assets/js/templatePublic.js"></script>
<script src="./assets/js/scriptAjax.js"></script>
<script src="./assets/js/scriptStripe.js"></script>
</body>
</html>
