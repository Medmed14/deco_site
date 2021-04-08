<?php

class PublicOrderModel extends Driver{


    public function insertCommande(Commande $order){

        $sql = "INSERT INTO commandes (nom, prenom, tel, objet, email, message)
                VALUES (:nom, :prenom, :tel, :objet, :email, :message)";

        $tabParams = ["nom"=>$order->getNom(),"prenom"=>$order->getPrenom(), "tel"=>$order->getTel(), "objet"=>$order->getObjet(), "email"=>$order->getEmail(), "message"=>$order->getMessage()]; 

        $result= $this->getRequest($sql, $tabParams);

        return $result;
    }


}