<?php

class Avoir{
    // attribut
    private $idprevision;
    private $idCat;
    private $budget;

    // constructor
    public function __construct($idprevision,$idCat,$budget){
        $this->idprevision = $budget;
        $this->idCat = $idCat;
        $this->budget = $budget;
    }

/*------------------------------- 
                    SETTER ET GETTEUR
        -------------------------------*/

    public function getIdprevision():int{
        return $this->idprevision;
    }
    public function setIdprevision($idprevision):void{
        $this->idprevision = $idprevision;
    }
    public function getIdCat():int{
        return $this->idCat;
    }
    public function setIdCat($idCat):void{
        $this->idCat = $idCat;
    }


    public function getBudget():float{
        return $this->budget;
    }
    public function setBudget($budget):void{
        $this->budget = $budget;
    }

}


?>