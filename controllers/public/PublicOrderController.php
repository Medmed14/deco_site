<?php


class PublicOrderController{

    private $addCommande;

    public function __construct(){

        $this->addCommande = new PublicOrderModel();
    }


    public function addOrder(){
        
        if(isset($_POST['soumis']) && !empty($_POST['nom']) && !empty($_POST['email'])){

            $nom = trim(htmlentities(addslashes($_POST['nom'])));
            $prenom = trim(htmlentities(addslashes($_POST['prenom'])));
            $tel = trim(htmlentities(addslashes($_POST['tel'])));
            $objet = trim(htmlentities(addslashes($_POST['objet'])));
            $email = trim(htmlentities(addslashes($_POST['email'])));
            $message = trim(htmlentities(addslashes($_POST['message'])));
            
            $newOrder = new Commande();
            $newOrder->setNom($nom);
            $newOrder->setPrenom($prenom);
            $newOrder->setTel($tel);
            $newOrder->setObjet($objet);
            $newOrder->setEmail($email);
            $newOrder->setMessage($message);
            
            
            $ok = $this->addCommande->insertCommande($newOrder); 
            if($ok){
                header('location:index.php');
            }
            
        }
        require_once('./views/public/orderForm.php');
    }
    
//     //affichage du formulaire
//    $editOrder = $this->addCommande->recupCategories();
//     require_once('./views/admin/objets/adminAddObj.php');

//     }
}