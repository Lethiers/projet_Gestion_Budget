<?php

class Type_demande{
    // attribut
    private $id_type_demande;
    private $nom_type_demande;

    // constructor
    public function __construct($id_type_demande,$nom_type_demande){
        $this->id_type_demande = $id_type_demande;
        $this->nom_type_demande = $nom_type_demande;

    }

    //setteur et getteur
    public function getIdTypeDemande():int{
        return $this->id_type_demande;
    }
    public function setIdTypeDemande($id_type_demande):void{
        $this->id_type_demande = $id_type_demande;
    }
    public function getNomTypeDemande():int{
        return $this->nom_type_demande;
    }
    public function setNomTypeDemande($nom_type_demande):void{
        $this->nom_type_demande = $nom_type_demande;
    }

}


?>