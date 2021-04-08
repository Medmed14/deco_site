<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h1 class="display-5 text-center font-monospace mt-2 mb-5">Ajout d'un nouveau grade</h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" id="newGrade" name="newGrade" class="form-control" placeholder="Entrez un nouveau grade...">
                <button type="submit" class="btn btn-primary col-12 mt-4" name="soumis">Ajouter</button>
            </form>
        </div>
    </div>
</div>
<?php
$contenu = ob_get_clean();
require_once('./views/templateAdmin.php');
?>