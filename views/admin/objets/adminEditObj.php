<?php ob_start();?>

 <div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline">Editer l'objet " <?=$editObj->getIntitule();?> " </h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col">
                        <label for="marque">Marque</label>
                        <input type="text" id="marque" name="marque" class="form-control" value="<?=$editObj->getMarque();?>" >
                    </div>
                    <div class="col">
                        <label for="intitule">Intitulé</label>
                        <input type="text" id="intitule" name="intitule" class="form-control" value="<?=$editObj->getIntitule();?>" >
                    </div>
                    <div class="col">
                        <label for="cat">Catégorie</label>
                        <select id="cat" name="cat" class="form-select">

                        <option value="<?=$editObj->getCategorie()->getId_cat();?>">
                         <?php
                         foreach ($tabCat as $cat) { 
                             if( $cat->getId_cat() == $editObj->getCategorie()->getId_cat()) {
                                 echo $cat->getNom_cat();
                                }
                            }
                        ?>
                        </option>

                        <?php foreach ($tabCat as $cat) { if( $cat->getId_cat() != $editObj->getCategorie()->getId_cat()) {?>
                            <option value="<?=$cat->getId_cat();?>"><?=$cat->getNom_cat();?></option>
                        <?php }}; ?>

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="prix">Prix</label>
                        <input type="text" id="prix" name="prix" class="form-control"  value="<?=$editObj->getPrix();?>">
                    </div>
                    <div class="col">
                        <label for="quantite">Quantité</label>
                        <input type="number" id="quantite" name="quantite" class="form-control" value="<?=$editObj->getQuantite();?>" >
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control"  >
                    </div>
                    <div class="col">
                        <img src="./assets/images/<?=$editObj->getImage();?>" alt="" width="200" class="img-thumbnail mt-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="desc">Description</label>
                        <textarea id="desc" name="desc" class="form-control"  rows="5"><?=$editObj->getDescription();?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning  col-12 mt-2" name="soumis">Modifier</button>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>