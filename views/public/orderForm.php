<?php ob_start(); ?>

<div class="container">
  <h1 class="text-center mt-5 mb-5">Récaputulatif de votre commande</h1>
  <div class="row">
    <div class="col-6 offset-3">
      


      
      <div class="card-body ">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
         
          
            
          <label for="nom">Nom </label>
          <input  type="text" id="nom" required name="nom" class="mb-3 form-control" placeholder="Votre nom svp...">

          <label for="prenom">Prénom </label>
          <input type="text" id="prenom" required name="prenom" class="mb-3 form-control" placeholder="Votre prenom svp...">
          
          
          <label for="tel">Téléphone</label>
          <input type="number" id="tel" required name="tel" class="mb-3 form-control" placeholder="Votre telephone ...">

          <label for="objet">Objet désiré</label>
          <input type="text" id="objet" required name="objet" class="mb-3 form-control" placeholder="Votre objet ...">

          <label for="email">Email</label>
          <input type="email" id="email" required name="email" class="mb-3 form-control" placeholder="Votre email ...">

          <label for="message">Message</label>
          <textarea id="message" name="message" required class="mb-3 form-control" placeholder="Votre message ..."></textarea>

          <button type="submit" name="soumis" class="mt-2 btn btn-warning col-12"><i class="far fa-check-square"></i> Envoyer</button>
        </form>


      </div>
    </div>
  </div>
  <?php
  $contenu = ob_get_clean();
  require_once('./views/public/templatePublic.php');
  ?>