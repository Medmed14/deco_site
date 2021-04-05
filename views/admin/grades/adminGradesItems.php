<?php ob_start();?>
<h1 class="display-5 text-center font-monospace mt-2 mb-5">Les grades d'utilisateurs</h1>
  <table class="table table-striped text-center">
      <thead>
          <tr>
              <th>Id</th>
              <th>Nom</th>
              <th colspan="2">Actions</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($allGrades as  $grade) { ?>
          <tr>
             <td><?=$grade->getId_g()?></td>
             <td><?=$grade->getNom_g()?></td>
             <td><a class="btn btn-warning" href=""><i class="fas fa-edit" aria-hidden="true"></i></a></td>
             <?php if($_SESSION['Auth']->id_g != 3 ){ ?>
             <td><a class="btn btn-danger" href=""><i class="fas fa-trash" aria-hidden="true"></i></a></td>
            <?php } ?>
          </tr>
          <?php } ?>
      </tbody>
  </table>
  


<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>