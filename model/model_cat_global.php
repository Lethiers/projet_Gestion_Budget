<?php

class CategorieGlobal{

    /*------------------------------- 
                        ATTRIBUTS
            -------------------------------*/

    private $nom_categorie_global;
    private $id_categorie_global;

    /*------------------------------- 
                        CONSTRUCTEUR
            -------------------------------*/
    public function __construct($nom_categorie_global,$id_categorie_global){
        $this->nom = $nom_categorie_global;
        $this->nom = $id_categorie_global;
    }
    /*------------------------------- 
                        SETTER ET GETTEUR
            -------------------------------*/

    public function getNom():string{
        return $this->nom_categorie_global;
    }
    public function setNom($nom_categorie_global):void{
        $this->nom_categorie_global = $nom_categorie_global;
    }


    public function getIdCatGlobal():int{
        return $this->id_categorie_global;
    }
    public function setIdCatGlobal($id_categorie_global):void{
        $this->id_categorie_global = $id_categorie_global;
    }

}

?>