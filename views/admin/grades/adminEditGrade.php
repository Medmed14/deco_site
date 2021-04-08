<?php ob_start();
?>

 <div class="container">
 <h1 class="display-5 text-center font-monospace mt-3">Ajout d'un nouveau grade</h1>
     <div class="row">
         <div class="col-6 offset-3 mt-5">
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <label class="mt-5" for="">Identifiant du grade</label>
                 <input type="text" class="form-control mb-4"  value="<?=$grade->getId_g();?>" readonly>
                 <label for="newGrade">Nouveau grade</label>
                 <input type="text" id="newGrade" name="newGrade" class="form-control" value="<?=$grade->getNom_g();?>">
                <button type="submit" class="btn btn-warning col-12 mt-5" name="soumis">Modifier</button>
                </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>