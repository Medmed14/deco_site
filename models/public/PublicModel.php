<?php

class PublicModel extends Driver{

    public function findObjByCat(Objet $objet){

        $sql = "SELECT * FROM objet o
                INNER JOIN categorie c
                ON o.id_cat = c.id_cat
                WHERE o.id_cat=:id";

        $result = $this->getRequest($sql, ["id"=>$objet->getCategorie()->getId_cat()]);

        $rows = $result->fetchAll(PDO::FETCH_OBJ);    //fetch retourne 1 seul enregistrement  (donc on doit boucler), fetch all retourne toutes les lignes automatiquement
        $objets = [];
        // $rows retourne les lignes de notre table de bdd choisie dans la requete
        foreach($rows as $row){

            $newObjet = new Objet();

            $newObjet->setId_obj($row->id_obj); // dans la bdd c'est id_v
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


}