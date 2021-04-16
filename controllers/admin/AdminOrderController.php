<?php

class AdminOrderController{

    private $addCommande;

    public function __construct()
    {
        $this->addCommande = new AdminOrderModel();
    }

    public function listOrders(){

        AuthController::isLogged();
        $allCommande = $this->addCommande->getOrders();
        require_once('./views/admin/commandes/adminCommandesItems.php');
    }

    public function removeOrder(){

        AuthController::isLogged();

        if(isset($_GET['id'])  && filter_var($_GET['id'],FILTER_VALIDATE_INT)){

            $id = $_GET['id'];
            $deleteCmd = new Commande();
            $deleteCmd->setId_cmd($id);
            $nbLine = $this->addCommande->deleteOrder($deleteCmd);

            if($nbLine > 0){
                header('location: index.php?action=list_cmd');
            }
        }
    }
}

