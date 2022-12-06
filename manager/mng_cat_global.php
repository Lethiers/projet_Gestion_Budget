<?php

class ManagerCategorieGlobal extends CategorieGlobal{


    public function __construct(){
        
    }
        /*------------------------------- 
                        METHODES
            -------------------------------*/
    // fonction pour créer une catégorie utilisateur OK FONCTIONNE
    public function addCategorieUtil($bdd):void{
        try {
            
            $req = $bdd->prepare('INSERT INTO categorie_global(nom_categorie_global)
            VALUES (:nom_categorie_global)');
            $req->bindValue(':nom_categorie_global',$this->getNom());
            $req->execute();

        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour afficher toute les categories global
    public function showAllCategorieGlobal($bdd):array{
        try {
            
            $req = $bdd->prepare('SELECT * FROM categorie_global');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;



        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }
    // fonction pour retourner le nom de la categorie par id
    public function returnNameCatGlobal($bdd):array{
        try {
            $req = $bdd->prepare('SELECT nom_categorie_global FROM categorie_global WHERE id_categorie_global=:id_categorie_global');
            $req->bindValue(':id_categorie_global',$this->getIdCatGlobal());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour voir une catégorie global
    public function showCategorieGlobal($bdd):array{
        try {
            
            $req = $bdd->prepare('SELECT * FROM categorie_global WHERE id_categorie_global=:id_categorie_global');
            $req->bindValue(':id_categorie_global', $this->getIdCatGlobal());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // supprimer une catégorie global
    public function deleteCategorieGlobal($bdd):void{
        try {
            
            $req = $bdd->prepare('DELETE FROM categorie_global WHERE id_categorie_global=:id_categorie_global');
            $req->bindValue(':id_categorie_global',$this->getIdCatGlobal());
            $req->execute();

        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour modifier une catégorie global
    public function modifyCatGlobal($bdd){
        try {
            $req = $bdd->prepare('UPDATE categorie_global 
            SET nom_categorie_global=:nom_categorie_global 
            WHERE id_categorie_global=:id_categorie_global');
            $req->bindValue(':nom_categorie_global', $this->getNom());
            $req->bindValue(':id_categorie_global',$this->getIdCatGlobal());
            $req->execute();



        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }
}

?>