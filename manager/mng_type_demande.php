<?php
class ManagerTypeDemande extends Type_demande{


    public function __construct(){

    }

    // récuperer une demande
    public function showAllDemande($bdd){
        try {
            $req=$bdd->prepare('SELECT * FROM type_demande');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }



}




?>