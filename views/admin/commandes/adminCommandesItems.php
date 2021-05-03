<?php ob_start();

?>

<h1 class="display-5 text-center font-monospace mt-2 mb-5">Liste des commandes clients</h1>
<div class="row">
    <!-- <div class="col-4 offset-8 mb-4">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
            <input class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher...">
            <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
        </form> 
    </div> -->
</div>
<table class="table table-striped">
    <thead class="text-center">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            <th>Objet désiré</th>
            <th>Email</th>
            <th>Message</th>
            <th colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <?php foreach($allCommande as  $commande) { ?>
                    <td class="text-center"><?= $commande->getId_cmd(); ?></td>
                    <td class="text-center"><?= $commande->getNom(); ?></td>
                    <td class="text-center"><?= $commande->getPrenom(); ?></td>
                    <td class="text-center"><?= $commande->getTel(); ?></td>
                    <td class="text-center"><?= $commande->getObjet(); ?></td>
                    <td class="text-center"><?= $commande->getEmail(); ?></td>
                    <td class="text-center"><?= $commande->getMessage(); ?></td>
                    
             <?php if($_SESSION['Auth']->id_g != 3 ){ ?>
             <td><a class="btn btn-danger" href="index.php?action=delete_cmd&id=<?= $commande->getId_cmd();?>" onclick="return confirm('Etes vous sûr de vouloir supprimer ?')"><i class="fas fa-trash" aria-hidden="true"></i></a></td>
            <?php } ?>
        </tr>  
        <?php } ?>
    </tbody>
</table>

<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');
?>