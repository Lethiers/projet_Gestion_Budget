<?php
    class ManagerOperation extends Operation{

        public function __construct(){
        
        }
        /*------------------------------- 
                    METHODES
        -------------------------------*/


    // fonction pour ajouter une depense        
    public function addOperation($bdd):void{

        try {

            $date_operation = $this->getDate();
            $montant_operation = $this->getMontant();
            $nom_operation = $this->getNom();
            $id_categorie_global = $this->getidCatGlobal();
            $id_categorie_utilisateur = $this->getidCatUtil();
            $id_util = $this->getIdUtil();

            $req = $bdd->prepare('INSERT INTO operation(date_operation,montant_operation,nom_operation,id_categorie_global,id_categorie_utilisateur,id_util)
            VALUES(?,?,?,?,?,?)');


            $req->bindparam(1,$date_operation,PDO::PARAM_STR);
            $req->bindparam(2,$montant_operation,PDO::PARAM_STR);
            $req->bindparam(3,$nom_operation,PDO::PARAM_STR);
            $req->bindparam(4,$id_categorie_global,PDO::PARAM_INT);
            $req->bindparam(5,$id_categorie_utilisateur,PDO::PARAM_INT);
            $req->bindparam(6,$id_util,PDO::PARAM_INT);
            $req->execute();

        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }


    // fonction pour aficher toute les par date
    public function showAllOperationByDate($bdd):array{
        try {
            
            $req = $bdd->prepare('SELECT * FROM operation WHERE date_operation>=:date_operation and id_util=:id_util');
            $req->bindValue('date_operation',$this->getDate());
            $req->bindValue('id_util',$this->getIdUtil());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;

        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }


    // fonction pour aficher toute les depenses
    public function showAllOperation($bdd):array{
        try {
            $req = $bdd->prepare('SELECT * FROM operation');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour aficher toute les depenses d'un utilisateur
    public function showAllOperationByIdUtil($bdd):array{
        try {
            $req = $bdd->prepare('SELECT * FROM operation WHERE id_util=:id_util order by date_operation');
            $req->bindValue('id_util',$this->getIdUtil());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;

        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour aficher toute les depenses d'un utilisateur par date
    public function showAllOperationByIdUtilByDate($bdd,$debut,$fin):array{
        try {
            $req = $bdd->prepare('SELECT * FROM operation where date_operation between :debut and :fin  and id_util=:id_util order by date_operation;');
            $req->bindValue('id_util',$this->getIdUtil());
            $req->bindValue(':debut',$debut);
            $req->bindValue(':fin',$fin);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;

        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    public function showOperation($bdd):array{
        try {
            $req = $bdd->prepare('SELECT * FROM operation WHERE id_operation = :id_operation');
            $req->bindValue('id_operation',$this->getIdOperation());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

        public function showOperationByIdCatAndUtil($bdd,$debut,$fin):array{
        try {
            $req = $bdd->prepare('SELECT * FROM operation WHERE id_util =:id_util AND 
            id_categorie_global=:id_categorie_global and date_operation between :debut and :fin ;');
            $req->bindValue(':id_util',$this->getIdUtil());
            $req->bindValue(':id_categorie_global',$this->getidCatUtil());
            $req->bindValue(':debut',$debut);
            $req->bindValue(':fin',$fin);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }


    public function deleteOperation($bdd):void{
        try {
            $req = $bdd->prepare('DELETE FROM operation WHERE id_operation = :id_operation');
            $req->bindValue('id_operation',$this->getIdOperation());
            $req->execute();

            }
        catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }


    public function deleteOperationByUtil($bdd):void{
        try {
            $req = $bdd->prepare('DELETE FROM operation WHERE id_util = :id_util');
            $req->bindValue(':id_util',$this->getIdUtil());
            $req->execute();

            }
        catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    public function deleteOperationByIdCatGlobal($bdd):void{
        try {
            $req = $bdd->prepare('DELETE FROM operation WHERE id_categorie_global = :id_categorie_global');
            $req->bindValue(':id_categorie_global',$this->getidCatUtil());
            $req->execute();

            }
        catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }



    public function modifyOperation($bdd):void{
        try {
            $req = $bdd->prepare('UPDATE operation SET nom_operation=:nom_operation,
            date_operation=:date_operation, montant_operation= :montant_operation,id_categorie_utilisateur=:id_categorie_utilisateur,
            id_categorie_global=:id_categorie_global WHERE id_operation = :id_operation');
            $req->BindValue(':date_operation',$this->getDate());
            $req->BindValue(':montant_operation',$this->getMontant());
            $req->BindValue(':nom_operation',$this->getNom());
            $req->BindValue(':id_categorie_global',$this->getidCatGlobal());
            $req->BindValue(':id_categorie_utilisateur',$this->getidCatUtil());
            $req->BindValue('id_operation',$this->getIdOperation());
            $req->execute();


            }
        catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    public function updateOperation($bdd):void{
        try {
            $req = $bdd->prepare("UPDATE operation SET id_categorie_utilisateur = null 
            WHERE id_categorie_utilisateur =:id_categorie_utilisateur");
            $req->BindValue(':id_categorie_utilisateur',$this->getidCatUtil());
            $req->execute();

        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    public function searchOperation($bdd,$search){
        try {

            $req = $bdd->prepare("SELECT * FROM operation WHERE nom_operation LIKE :recherche AND id_util =:id_util");
        
            $req->bindValue(':recherche',$search.'%');
            $req->bindValue(':id_util',$this->getIdUtil());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;


        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }



}



?>