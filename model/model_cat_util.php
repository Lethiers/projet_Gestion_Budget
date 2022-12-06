<?php

class CategorieUtil{

    /*------------------------------- 
                        ATTRIBUTS
            -------------------------------*/

    private $id_categorie_utilisateur;
    private $nom_categorie_utilisateur;
    private $id_util;
    private $id_categorie_global;

    /*------------------------------- 
                        CONSTRUCTEUR
            -------------------------------*/
    public function __construct($nom_categorie_utilisateur,$id_util,$id_categorie_global){
        $this->nom_categorie_utilisateur = $nom_categorie_utilisateur;
        $this->id_util = $id_util;
        $this->id_categorie_global = $id_categorie_global;
    }
    /*------------------------------- 
                        SETTER ET GETTEUR
            -------------------------------*/


    public function getNom():string{
        return $this->nom_categorie_utilisateur;
    }
    public function setNom($nom_categorie_utilisateur):void{
        $this->nom_categorie_utilisateur = $nom_categorie_utilisateur;
    }

    public function getIdUtil():int{
        return $this->id_util;
    }
    public function setIdUtil($id_util):void{
        $this->id_util = $id_util;
    }

    public function getCatGlobal():int{
        return $this->id_categorie_global;
    }
    public function setCatGlobal($id_categorie_global):void{
        $this->id_categorie_global = $id_categorie_global;
    }

    // possiblement nullable
    public function getIdCatUtil(){
        return $this->id_categorie_utilisateur;
    }
    public function setIdCatUtil($id_categorie_utilisateur):void{
        $this->id_categorie_utilisateur = $id_categorie_utilisateur;
    }
}

?>