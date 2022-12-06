<?php
class ManagerCatUtil extends CategorieUtil{

    public function __construct(){
        
    }
    
    /*------------------------------- 
                        METHODES
            -------------------------------*/
    // fonction pour créer une catégorie utilisateur
    public function addCategorieUtil($bdd):void{
        try {
            
            $req = $bdd->prepare('INSERT INTO categorie_utilisateur(nom_categorie_utilisateur,id_util,id_categorie_global)
            VALUES (:nom_categorie_utilisateur,:id_util,:id_categorie_global)');
            $req->bindValue(':nom_categorie_utilisateur', $this->getNom());
            $req->bindValue(':id_util', $this->getIdUtil());
            $req->bindValue(':id_categorie_global',$this->getCatGlobal());
            $req->execute();
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour voir une catégorie utilisateur par utilisateur
    public function showCategorieUtil($bdd):array{
        try {
            
            $req = $bdd->prepare('SELECT * FROM categorie_utilisateur WHERE id_util=:id_util');
            $req->bindValue(':id_util',$this->getIdUtil());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;

        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour voir une catégorie utilisateur par utilisateur
    public function returnNameCatUtil($bdd):array{
        try {
            
            $req = $bdd->prepare('SELECT nom_categorie_utilisateur,id_categorie_global  FROM categorie_utilisateur 
            WHERE id_categorie_utilisateur=:id_categorie_utilisateur');
            $req->bindValue(':id_categorie_utilisateur',$this->getIdCatUtil());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;

        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour voir une catégorie utilisateur par utilisateur
    public function showCategorieUtilById($bdd):array{
        try {
            
            $req = $bdd->prepare('SELECT * FROM categorie_utilisateur WHERE id_categorie_utilisateur=:id_categorie_utilisateur');
            $req->bindValue('id_categorie_utilisateur',$this->getIdUtil());
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;



        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // supprimer une catégorie utilisateur
    public function deleteCategorieUtilByIdGlobal($bdd):void{
        try {
            
            $req = $bdd->prepare('DELETE FROM categorie_utilisateur WHERE id_categorie_global=:id_categorie_global');
            $req->bindValue('id_categorie_global',$this->getCatGlobal());
            $req->execute();
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // supprimer une catégorie utilisateur by id util
    public function deleteCategorieUtil($bdd):void{
        try {
            
            $req = $bdd->prepare('DELETE FROM categorie_utilisateur WHERE id_categorie_utilisateur=:id_categorie_utilisateur');
            $req->bindValue(':id_categorie_utilisateur',$this->getIdCatUtil());
            $req->execute();
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // supprimer une catégorie utilisateur by id util
    public function deleteCategorieUtilByIdUtil($bdd):void{
        try {
            
            $req = $bdd->prepare('DELETE FROM categorie_utilisateur WHERE id_util=:id_util');
            $req->bindValue(':id_util',$this->getIdUtil());
            $req->execute();
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }

    // fonction pour modifier une catégorie utilisateur
    public function modifyCatUtil($bdd){
        try {
            $req = $bdd->prepare('UPDATE categorie_utilisateur SET nom_categorie_utilisateur=:nom_categorie_utilisateur, 
            id_categorie_global=:id_categorie_global, id_util=:id_util WHERE id_categorie_utilisateur=:id_categorie_utilisateur');
            
            $req->bindValue(':id_util',$this->getIdUtil());
            $req->bindValue(':id_categorie_global',$this->getCatGlobal());
            $req->bindValue(':nom_categorie_utilisateur',$this->getNom());
            $req->bindValue(':id_categorie_utilisateur',$this->getIdCatUtil());
            
            $req->execute();
        } catch (Exception $e) {
            die ('Erreur :' .$e->getMessage());
        }
    }
}
?>