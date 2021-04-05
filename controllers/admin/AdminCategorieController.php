<?php

class AdminCategorieController{

    private $addCat;
    public function __construct()
    {
        $this->addCat = new AdminCategorieModel();
    }

    public function listCat(){
        AuthController::isLogged(); 
         $allCat = $this->addCat->recupCategories();
         require_once('./views/admin/adminCategoriesItems.php');
        
    }

    public function removeCat(){
        AuthController::isLogged(); 
        AuthController::accessUser();
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){

            $id = trim(addslashes(htmlentities($_GET['id'])));
            $nbLine = $this->addCat->deleteCat($id);

            if($nbLine > 0){
                header('location: index.php?action=list_cat');
            }
        }
    }

    public function editCat(){
        AuthController::isLogged(); 
        AuthController::accessUser();
        
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
           
            $id = trim($_GET['id']);
            $cat = $this->addCat->categorieItem($id);

            if(isset($_POST['soumis']) && !empty($_POST['categorie'])){

                $categorie = trim(addslashes(htmlentities($_POST['categorie'])));
                $cat->setNom_cat($categorie);
                $nb = $this->addCat->updateCategorie($cat);
                
                if($nb > 0){
                    header('location:index.php?action=list_cat');
                }
            }

            require_once('./views/admin/adminEditCat.php');

        }
    }

    public function addCat(){
        AuthController::isLogged();

        if(isset($_POST['soumis']) && !empty($_POST['categorie'])){
            $nom_cat = trim(htmlentities(addslashes($_POST['categorie'])));
            $newCat = new Categorie();
            $newCat->setNom_cat($nom_cat);

            $ok = $this->addCat->insertCategorie($newCat);
            if($ok){
                header('location:index.php?action=list_cat');
            }
        }
        require_once('./views/admin/adminAddCat.php');
    }
}
