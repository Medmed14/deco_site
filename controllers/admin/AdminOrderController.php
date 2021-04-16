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

}