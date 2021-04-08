<?php

class AdminObjetController{

    private $addObjet;

    public function __construct()
    {
        $this->addObjet = new AdminObjetModel();
        $this->addCat = new AdminCategorieModel();
    }

    public function listObjets(){
        AuthController::isLogged();
        
        if(isset($_POST['soumis']) && !empty($_POST['search'])){
            $search = trim(htmlspecialchars(addslashes($_POST['search'])));
            $objets = $this->addObjet->getObjets($search);
            require_once('./views/admin/objets/adminObjetsItems.php');
  
        }else{
            $objets = $this->addObjet->getObjets();
            require_once('./views/admin/objets/adminObjetsItems.php');
        }
        
    }

    public function addObjets(){
        AuthController::isLogged();

        if(isset($_POST['soumis']) && !empty($_POST['marque']) && !empty($_POST['prix'])){
            $marque = trim(htmlentities(addslashes($_POST['marque'])));
            $intitule = trim(htmlentities(addslashes($_POST['intitule'])));
            $prix = trim(htmlentities(addslashes($_POST['prix'])));
            $quantite = trim(htmlentities(addslashes($_POST['quantite'])));
            $id_cat = trim(htmlentities(addslashes($_POST['cat'])));
            $description = trim(htmlentities(addslashes($_POST['desc'])));
            $image = $_FILES['image']['name'];

            $newObjet = new Objet();
            $newObjet->setMarque($marque);
            $newObjet->setIntitule($intitule);
            $newObjet->setPrix($prix);
            $newObjet->setQuantite($quantite);
            $newObjet->getCategorie()->setId_cat($id_cat);
            $newObjet->setDescription($description);
            $newObjet->setImage($image);

            $destination = './assets/images/';
            move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
            $ok = $this->addObjet->insertObjet($newObjet); 
            if($ok){
                header('location:index.php?action=list_obj');
            }
        }
        
        //affichage du formulaire
       $editObj = $this->addCat->recupCategories();
        require_once('./views/admin/objets/adminAddObj.php');
    }

    public function removeObjet(){
        AuthController::isLogged();

       if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
           $id = $_GET['id'];
           $deleteObj = new Objet();
           $deleteObj->setId_obj($id);
           $nb = $this->addObjet->deleteObjet($deleteObj);

           if($nb > 0){
               header('location:index.php?action=list_obj');
           }
           
       } 
    }

    public function editObjet(){
        AuthController::isLogged();

        if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = $_GET['id'];
            $editO = new Objet();
            $editO->setId_obj($id);
            $editObj = $this->addObjet->objetItem($editO);
            
           $tabCat = $this->addCat->recupCategories();
           
           if(isset($_POST['soumis']) && !empty($_POST['marque']) && !empty($_POST['prix'])){
               
               $marque = trim(htmlentities(addslashes($_POST['marque'])));
               $intitule = trim(htmlentities(addslashes($_POST['intitule'])));
               $prix = trim(htmlentities(addslashes($_POST['prix'])));
               $quantite = trim(htmlentities(addslashes($_POST['quantite'])));
               $id_cat = trim(htmlentities(addslashes($_POST['cat'])));
               $description = trim(htmlentities(($_POST['desc'])));
               $image = $_FILES['image']['name'];
               
               $editObj->setMarque($marque);
               $editObj->setIntitule($intitule);
               $editObj->setPrix($prix);
               $editObj->setQuantite($quantite);
               $editObj->getCategorie()->setId_cat($id_cat);
               $editObj->setDescription($description);
               $editObj->setImage($image);
               
               $destination = './assets/images/';
               move_uploaded_file($_FILES['image']['tmp_name'],$destination.$image);
               $this->addObjet->updateObjet($editObj); 
               
                   header('location:index.php?action=list_obj');
                
            }
            require_once('./views/admin/objets/adminEditObj.php');
        }
    }
}