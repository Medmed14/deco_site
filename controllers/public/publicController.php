<?php

class PublicController{

    private $pubObjMod;
    private $pubCatMod;
    private $pubMod;

    public function __construct()
    {
        $this->pubObjMod = new AdminObjetModel();
        $this->pubCatMod = new AdminCategorieModel();
        $this->pubMod = new PublicModel();

    }

    public function recupPubObjets(){
        
        if(isset($_GET['id']) && !empty($_GET['id'])){
            if( isset($_POST['soumis']) && !empty($_POST['search'])){
                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabCat = $this->pubCatMod->recupCategories();
                $objets = $this->pubObjMod->getObjets($search);
                require_once('./views/public/accueil.php');
            }
            $id = trim(htmlentities(addslashes($_GET['id'])));
            $obj = new Objet();
            $obj->getCategorie()->setId_cat($id);
            $tabCat = $this->pubCatMod->recupCategories();
            $objets = $this->pubMod->findObjByCat($obj);
            require_once('./views/public/objetsCat.php');
      
        }else{
            if( isset($_POST['soumis']) && !empty($_POST['search'])){
                $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                $tabCat = $this->pubCatMod->recupCategories();
                $objets = $this->pubObjMod->getObjets($search);
                require_once('./views/public/accueil.php');
            }
            $tabCat = $this->pubCatMod->recupCategories();
            $objets = $this->pubObjMod->getObjets();

        require_once('./views/public/accueil.php');
        }
    }

    public function recap(){

        if(isset($_POST['envoi']) && !empty($_POST['marque']) && !empty($_POST['prix'])){
            $marque = htmlspecialchars(addslashes($_POST['marque']));
            $intitule = htmlspecialchars(addslashes($_POST['intitule']));
            $image = htmlspecialchars(addslashes($_POST['image']));
            $prix = htmlspecialchars(addslashes($_POST['prix']));

            require_once('./views/public/objetItem.php');
        }
    }

    public function orderCar(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes(htmlspecialchars($_GET['id']));
            require_once('./views/public/orderForm.php');
        }
    }
}