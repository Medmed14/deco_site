<?php

class PublicModel extends Driver{

    public function findObjByCat(Objet $objet){

        $sql = "SELECT * FROM objet o
                INNER JOIN categorie c
                ON o.id_cat = c.id_cat
                WHERE o.id_cat=:id";

        $result = $this->getRequest($sql, ["id"=>$objet->getCategorie()->getId_cat()]);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);    
        $objets = [];

        foreach($rows as $row){

            $newObjet = new Objet();

            $newObjet->setId_obj($row->id_obj);
            $newObjet->setMarque($row->marque);
            $newObjet->setIntitule($row->intitule);
            $newObjet->setPrix($row->prix);
            $newObjet->setQuantite($row->quantite);
            $newObjet->setImage($row->image);
            $newObjet->setDescription($row->description);
            $newObjet->getCategorie()->setId_cat($row->id_cat);
            $newObjet->getCategorie()->setNom_cat($row->nom_cat);

            array_push($objets, $newObjet);
        }
        return $objets;
    }

    public function updateStock(Objet $obj){
        $sql = "UPDATE objet SET quantite = :quantite
                WHERE id_obj = :id";
        $result = $this->getRequest($sql, ['quantite'=>$obj->getQuantite(), 'id'=>$obj->getId_obj()]);
        return $result->rowCount();
    }

  

}