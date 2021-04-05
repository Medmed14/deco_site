<?php ob_start();

?>
<h1 class="display-5 text-center font-monospace mt-2 mb-5">Liste des Objets en vente</h1>
<div class="row">
    <div class="col-4 offset-8 mb-4">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
            <input class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher...">
            <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>
<table class="table table-striped">
    <thead class="text-center">
        <tr>
            <th>Id</th>
            <th>Marque</th>
            <th>Intitule</th>
            <th>Prix</th>
            <th>Image</th>
            <th>Quantite</th>
            <th>Description</th>
            <th>Categorie</th>
            <th colspan="2" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <?php if (is_array($objets)) {
                foreach ($objets as  $objet) { ?>
                    <td class="text-center"><?= $objet->getId_obj(); ?></td>
                    <td class="text-center"><?= $objet->getMarque(); ?></td>
                    <td class="text-center"><div id="intit"><?= $objet->getIntitule(); ?></div></td>
                    <td class="text-center"><div id="price"><?= $objet->getPrix(); ?> € </div></td>
                    <td class="text-center"><img src="./assets/images/<?= $objet->getImage(); ?>" alt="" width="100"></td>
                    <td class="text-center"><?= $objet->getQuantite(); ?></td>
                    <td class="text-left"><div id="description"><?= $objet->getDescription(); ?></div></td>
                    <td class="text-center"><?= $objet->getCategorie()->getNom_cat(); ?></td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="index.php?action=edit_obj&id=<?= $objet->getId_obj(); ?>">
                            <i class="fas fa-pen"></i>
                        </a>
                    </td>
                    <?php if ($_SESSION['Auth']->id_g != 3) { ?>
                        <td class="text-center">
                            <a class="btn btn-danger" href="index.php?action=delete_obj&id=<?= $objet->getId_obj(); ?>" onclick="return confirm('Etes vous sûr de vouloir supprimer ?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    <?php } ?>
        </tr>

<?php }
            } else {
                echo "<tr class='text-center text-danger'><td colspan='10' >" . $objets . "</td></tr>";
            } ?>
    </tbody>
</table>
<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');
?>