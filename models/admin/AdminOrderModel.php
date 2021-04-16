<?php

class AdminOrderModel extends Driver{

    public function getOrders(){

        $sql = "SELECT * FROM commandes ORDER BY id_cmd";
        $result = $this->getRequest($sql);
        $rows = $result->fetchAll(PDO::FETCH_OBJ);
        $tabCommandes = [];

        foreach ($rows as $row) {
            $commande = new Commande();
            $commande->setId_cmd($row->id_cmd);
            $commande->setNom($row->nom);
            $commande->setPrenom($row->prenom);
            $commande->setTel($row->telephone);
            $commande->setObjet($row->objet);
            $commande->setEmail($row->email);
            $commande->setMessage($row->message);

            array_push($tabCommandes, $commande);
        }
        return $tabCommandes;
    }

    public function deleteOrder(Commande $commande){
        $sql  = "DELETE FROM commandes WHERE id_cmd = :id";
        $result = $this->getRequest($sql, ['id'=>$commande->getId_cmd()]);
        return $result->rowCount();
    }
}