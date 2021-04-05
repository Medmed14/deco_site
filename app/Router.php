<?php

require_once('./app/autoload.php');

class Router{

    private $ctrlcat;
    private $ctrlobj;
    private $ctrluser;
    private $ctrlgrade;
    private $ctrlpub;

    public function __construct()
    {
        $this->ctrlcat = new AdminCategorieController();
        $this->ctrlobj = new AdminObjetController();
        $this->ctrluser = new AdminUtilisateurController();
        $this->ctrlgrade = new AdminGradeController();
        $this->ctrlpub = new PublicController();
    }

    public function getPath(){

        if(isset($_GET['action'])){

            switch($_GET['action']){
                case 'list_cat':
                    $this->ctrlcat->listCat();
                    break;
                case 'delete_cat':
                    $this->ctrlcat->removeCat();
                    break;
                case 'edit_cat':
                    $this->ctrlcat->editCat();
                    break;
                case 'add_cat':
                    $this->ctrlcat->addCat();
                    break;
                case 'list_obj':
                    $this->ctrlobj->listObjets();
                    break;
                case 'add_obj':
                    $this->ctrlobj->addObjets();
                    break;
                case 'delete_obj':
                    $this->ctrlobj->removeObjet();
                    break;
                case 'edit_obj':
                    $this->ctrlobj->editObjet();
                case 'list_u':
                    $this->ctrluser->listUsers();
                    break;
                case 'login':
                    $this->ctrluser->login();
                    break;
                case 'logout':
                    AuthController::logout();
                    break;
                case 'register':
                    $this->ctrluser->addUser();
                    break;
                case 'list_g':
                    $this->ctrlgrade->listGrades();
                    break;
                case 'checkout':
                    $this->ctrlpub->recap();
                    break;
                case 'order' :
                    $this->ctrlpub ->orderCar();
                    break;
            } 
        
        }else{
            $this->ctrlpub->recupPubObjets(); //ctrlpub est la methode qui nous retourne tous les objets
        }
    }
}