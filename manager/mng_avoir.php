<?php

class ManagerAvoir extends Avoir{

    public function __construct(){
        
    }
    
    // METHODES

    // methode pour ajouter un budget entre prevision et categorie total
    public function addAvoir($bdd):void{
        try {
            $req=$bdd->prepare('INSERT INTO avoir (id_prevision,id_categorie_global,budget)
            VALUES(:id_prevision,:id_categorie_global,:budget)');
            $req->bindValue(':id_prevision',$this->getIdprevision());
            $req->bindValue(':id_categorie_global',$this->getIdCat());
            $req->bindValue('budget',$this->getBudget());
            $req->execute();
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

        // methode pour afficher tout les budget
    public function showAllAvoir($bdd):array{
        try {
            $req=$bdd->prepare('SELECT * FROM avoir');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }
    // methode pour afficher tout les budget par id prevision
    public function showAllAvoirByPrevision($bdd):array{
        try {
            $req=$bdd->prepare('SELECT * FROM avoir WHERE id_prevision=:id_prevision');
            $req->bindValue(':id_prevision',$this->getIdprevision());
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    // methode de supression par id prevision
    public function deletePrevision($bdd):void{
        try {
            
            $req = $bdd->prepare('DELETE FROM avoir WHERE id_prevision=:id_prevision');
            $req->bindValue(':id_prevision',$this->getIdprevision(),PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }


    // methode de supression par id catGlobal
    public function deletePrevisionBycatGlobal($bdd):void{
        try {
            
            $req = $bdd->prepare('DELETE FROM avoir WHERE id_categorie_global=:id_categorie_global');
            $req->bindValue(':id_categorie_global',$this->getIdCat(),PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }


    // methode pour modifier
    public function modifyAvoir($bdd):void{
        try {
            $req = $bdd->prepare('UPDATE avoir SET budget=:budget WHERE id_categorie_global=:id_categorie_global AND id_prevision=:id_prevision');
            $req->bindValue(':budget',$this->getBudget());
            $req->bindValue(':id_categorie_global',$this->getIdCat());
            $req->bindValue(':id_prevision',$this->getIdprevision());
            $req->execute();
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // methode pour afficher un budget par id cat et id prevision
    public function showAvoirIdCatIdPrevision($bdd):array{
        try {
            $req=$bdd->prepare('SELECT * FROM avoir WHERE id_categorie_global=:id_categorie_global AND id_prevision=:id_prevision ');
            $req->bindValue(':id_categorie_global',$this->getIdCat());
            $req->bindValue(':id_prevision',$this->getIdprevision());
            $req->execute();

            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    // methode pour supprimer par id cat et id prevision
    public function deleteAvoirIdCatIdPrevision($bdd):void{
        try {
            $req=$bdd->prepare('DELETE FROM avoir WHERE id_categorie_global=:id_categorie_global AND id_prevision=:id_prevision ');
            $req->bindValue('id_categorie_global',$this->getIdCat());
            $req->bindValue('id_prevision',$this->getIdprevision());
            $req->execute();

        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    // test inner join avec la table prevision
    public function innerJoinPrevision($bdd):array{
        try {
            $req=$bdd->prepare('SELECT * FROM prevision INNER JOIN avoir WHERE prevision.id_prevision=:id_prevision');
            $req->bindValue(':id_prevision',$this->getIdprevision());
            $req->execute();
            // $req->execute(array(
            //     'id_prevision' => $idprevision,
            // ));
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    // test full join avec la table prevision
    public function fullJoinPrevision($bdd):array{
        try {
            $req=$bdd->prepare('SELECT * FROM prevision FULL JOIN avoir WHERE avoir.id_prevision=:id_prevision');
            $req->bindValue('id_prevision',$this->getIdprevision());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }
}

?>