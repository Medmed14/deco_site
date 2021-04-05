<?php

class AdminObjetModel extends Driver{

    public function getObjets($search = null){

        if(!empty($search)){
            $sql = "SELECT * 
                    FROM objet o
                    INNER JOIN categorie c
                    ON o.id_cat = c.id_cat
                    WHERE marque LIKE :marque OR intitule LIKE :intitule OR nom_cat LIKE :nom_cat
                    ORDER BY id_obj DESC";
            $searchParams = ["marque"=>"$search%", "intitule"=>"$search%", "nom_cat"=>"$search%"];
            $result = $this->getRequest($sql, $searchParams);
            //$objets = $result->fetchAll(PDO::FETCH_OBJ);

        }else{
            $sql = "SELECT * 
                    FROM objet o
                    INNER JOIN categorie c
                    ON o.id_cat = c.id_cat
                    ORDER BY id_obj DESC";
            $result = $this->getRequest($sql);
        }
       
        $objets = $result->fetchAll(PDO::FETCH_OBJ);

        $datas = [];
        //$cat = new Categorie();

        foreach ($objets as $objet) {

            $obj = new Objet();
            $obj->setId_obj($objet->id_obj);
            $obj->setMarque($objet->marque);
            $obj->setIntitule($objet->intitule);
            $obj->setPrix($objet->prix);
            $obj->setImage($objet->image);
            $obj->setQuantite($objet->quantite);
            $obj->setDescription($objet->description);
            $obj->getCategorie()->setId_cat($objet->id_cat);
            $obj->getCategorie()->setNom_cat($objet->nom_cat);
            array_push($datas, $obj);

        }
        if($result->rowCount() > 0){
            return $datas;
        }else{
            return "Pas de résultats...";
        }
    }

    public function insertObjet (Objet $objet){

        $sql = "INSERT INTO objet(marque, intitule, prix, quantite, image, description, id_cat)
                VALUES(:marque, :intitule, :prix, :quantite, :image, :descr, :id_cat)";
        
        $tabParams = ["marque"=>$objet->getMarque(),"intitule"=>$objet->getIntitule(), "prix"=>$objet->getPrix(), "quantite"=>$objet->getQuantite(), "image"=>$objet->getImage(), "descr"=>$objet->getDescription(), "id_cat"=>$objet->getCategorie()->getId_cat()]; 

        $result= $this->getRequest($sql, $tabParams);
        
        return $result;
    }



    public function deleteObjet(Objet $objet){

        $sql = "DELETE FROM objet WHERE id_obj = :id";
        $result = $this->getRequest($sql, ['id'=>$objet->getId_obj()]);

        return $result->rowCount();
    }

    public function objetItem(Objet $objetParams){

        $sql = "SELECT * FROM objet WHERE id_obj = :id";
        $result = $this->getRequest($sql, ['id'=>$objetParams->getId_obj()]);
        
        if($result->rowCount() > 0){

            $objetRow = $result->fetch(PDO::FETCH_OBJ);
            $editObjet = new Objet();
            $editObjet->setId_obj($objetRow->id_obj);
            $editObjet->setMarque($objetRow->marque);
            $editObjet->setIntitule($objetRow->intitule);
            $editObjet->setPrix($objetRow->prix);
            $editObjet->setQuantite($objetRow->quantite);
            $editObjet->setImage($objetRow->image);
            $editObjet->setDescription($objetRow->description);
            $editObjet->getCategorie()->setId_cat($objetRow->id_cat);

            return $editObjet;
        }

    }

    public function updateObjet(Objet $updateObj){
        if($updateObj->getImage() === ""){
            $sql = "UPDATE objet
                SET marque = :marque, intitule = :intitule, prix = :prix, quantite = :quantite, description = :description, id_cat = :id_cat
                WHERE id_obj = :id_obj";
                
          $tabParams = ["marque"=>$updateObj->getMarque(),"intitule"=>$updateObj->getIntitule(), "prix"=>$updateObj->getPrix(), "quantite"=>$updateObj->getQuantite(), "description"=>$updateObj->getDescription(), "id_cat"=>$updateObj->getCategorie()->getId_cat(), "id_obj"=>$updateObj->getId_obj()];

        }else{

            $sql = "UPDATE objet
                    SET marque = :marque, intitule = :intitule, prix = :prix, quantite = :quantite, image = :image, description = :description, id_cat = :id_cat
                    WHERE id_obj = :id_obj";
                    
              $tabParams = ["marque"=>$updateObj->getMarque(),"intitule"=>$updateObj->getIntitule(), "prix"=>$updateObj->getPrix(), "quantite"=>$updateObj->getQuantite(), "image"=>$updateObj->getImage(), "description"=>$updateObj->getDescription(), "id_cat"=>$updateObj->getCategorie()->getId_cat(), "id_obj"=>$updateObj->getId_obj()];
        }

          $result = $this->getRequest($sql, $tabParams);

         return $result->rowCount();
    }
}