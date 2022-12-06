<?php

class ManagerPrevision extends Prevision{

    public function __construct(){   
    }
    
    // methodes

    // fonction pour créer un prevision TEST OK
    public function addprevision($bdd){
        $req = $bdd->prepare('INSERT INTO prevision(nom_prevision,budget_prevision,id_util,id_frequence)
        VALUES (:nom_prevision,:budget_prevision,:id_util,:id_frequence)');
        $req->bindValue(':nom_prevision',$this->getNom());
        $req->bindValue('budget_prevision',$this->getBudget());
        $req->bindValue(':id_util',$this->getIdUtil());
        $req->bindValue(':id_frequence',$this->getIdFrequence());
        $req->execute();
    }


    // fonction pour voir les previsions TEST OK
    public function showAllprevision($bdd){
        $req = $bdd->prepare('SELECT * FROM prevision');
        $req->execute();
        $data = $req->fetchAll(PDO:: FETCH_OBJ);
        return $data;
    }

    // fonction pour afficher tout les previsions par id_util
    public function showprevisionById($bdd){
        try {
            $req =  $bdd->prepare('SELECT * FROM prevision WHERE id_util=:id_util');
            $req->BindValue('id_util',$this->getIdUtil());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour voir un prevision TEST OK
    public function showprevision($bdd){
        $req = $bdd->prepare('SELECT * FROM prevision WHERE id_prevision =:id_prevision');
        $req->bindValue(':id_prevision',$this->getIdPrevision());
        $req->execute();
        $data = $req->fetchAll(PDO:: FETCH_OBJ);
        return $data;
    }

    // fonction pour modifier un prevision OK MAIS VA FALLOIR RAJOUTER LES CATEGORES
    public function modifyprevision($bdd){
        $req = $bdd->prepare('UPDATE prevision 
        SET nom_prevision=:nom_prevision,budget_prevision=:budget_prevision,id_frequence=:id_frequence 
        WHERE id_prevision =:id_prevision;');
        $req->bindValue(':nom_prevision',$this->getNom());
        $req->bindValue(':budget_prevision',$this->getBudget());
        $req->bindValue(':id_frequence',$this->getIdFrequence());
        $req->bindValue(':id_prevision',$this->getIdPrevision());
        $req->execute();
    }

    // fonction pour supprimer un prevision TEST OK
    public function deleteprevision($bdd):void{
        $req = $bdd->prepare('DELETE FROM prevision WHERE id_prevision=:id_prevision');
        $req->bindValue(':id_prevision',$this->getIdPrevision(),PDO::PARAM_INT);
        $req->execute();
    }

    // fonction pour supprimer un prevision par utilisateur TEST OK
    public function deletePrevisionByUtil($bdd):void{
        $req = $bdd->prepare('DELETE FROM prevision WHERE id_util=:id_util');
        $req->bindValue(':id_util',$this->getIdUtil(),PDO::PARAM_INT);
        $req->execute();
    }

    // fonction pour supprimer un prevision TEST OK
    public function innerJoinAvoirByPrevision($bdd){
        $req = $bdd->prepare('SELECT * FROM prevision inner join avoir 
        where prevision.id_prevision = avoir.id_prevision and id_util=:id_util AND prevision.id_prevision=:id_prevision');
            $req->bindValue(':id_util' , $this->id_util);
            $req->bindValue(':id_prevision',$this->id_prevision);
        $req->execute();
        $data = $req->fetchAll(PDO:: FETCH_OBJ);
        return $data;
    }

    // retourner l'id max d'une prévision
    public function getMaxIdByUtil($bdd){
        $req = $bdd->prepare('SELECT max(id_prevision) as id_prevision FROM prevision where id_util = :id_util;');
            $req->bindValue(':id_util' , $this->getIdUtil());
        $req->execute();
        $data = $req->fetchAll(PDO:: FETCH_OBJ);
        return $data;
    }

}

?>