<?php


class Operation{

    /*------------------------------- 
                        ATTRIBUTS
            -------------------------------*/

    private ?int $id_operation;
    private ?string $date;
    private ?float $montant;
    private ?string $nom;
    private ?int $idCatGlobal;
    private ?int $idCatUtil;
    private ?int $id_util;

    /*------------------------------- 
                        CONSTRUCTEUR
            -------------------------------*/

    public function __construct($date,$montant,$nom,$idCatGlobal,$id_util){
        $this->date = $date;
        $this->montant= $montant;
        $this->nom= $nom;
        $this->idCatGlobal= $idCatGlobal;
        $this->id_util= $id_util;
        // $this->idCatUtil= $idCatUtil;
    }

    /*------------------------------- 
                        SETTER ET GETTEUR
            -------------------------------*/
    public function getIdOperation():int{
        return $this->id_operation;
    }
    public function setIdOperation(int $id_operation):void{
        $this->id_operation = $id_operation;
    }
    
    public function getDate():string{
        return $this->date;
    }
    public function setDate(string $date):void{
        $this->date = $date;
    }

    public function getMontant():float{
        return $this->montant;
    }
    public function setMontant(float $montant):void{
        $this->montant = $montant;
    }
    public function getNom():string{
        return $this->nom;
    }
    public function setNom(string $nom):void{
        $this->nom = $nom;
    }

    public function getidCatGlobal():int{
        return $this->idCatGlobal;
    }
    public function setidCatGlobal(int $idCatGlobal):void{
        $this->idCatGlobal = $idCatGlobal;
    }

    public function getidCatUtil(){
        return $this->idCatUtil;
    }
    public function setidCatUtil($idCatUtil):void{
        $this->idCatUtil = $idCatUtil;
    }

    public function getIdUtil(){
        return $this->id_util;
    }
    // pas de typage null possible
    public function setIdUtil($id_util):void{
        $this->id_util = $id_util;
    }
}


?>