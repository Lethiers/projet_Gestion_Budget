<?php

class prevision{

    // attribut 
    protected $id_prevision;
    protected $nom_prevision;
    protected $budget_prevision;
    protected $id_util;
    protected $id_frequence;
    
    // constructor
    public function __construct($nom_prevision,$budget_prevision,$id_util,$id_frequence){
        $this->nom_prevision = $nom_prevision;
        $this->nom_prevision = $budget_prevision;
        $this->id_util = $id_util;
        $this->id_frequence = $id_frequence;
    }

    // getteur and setteur

    public function getNom():string{
        return $this->nom_prevision;
    }
    public function setNom($nom_prevision):void{
        $this->nom_prevision = $nom_prevision;
    }


    public function getBudget():float{
        return $this->budget_prevision;
    }
    public function setBudget($budget_prevision):void{
        $this->budget_prevision = $budget_prevision;
    }


    public function getIdFrequence():int{
        return $this->id_frequence;
    }
    public function setIdFrequence($id_frequence):void{
        $this->id_frequence = $id_frequence;
    }

    public function getIdUtil():string{
        return $this->id_util;
    }
    public function setIdUtil($id_util):void{
        $this->id_util = $id_util;
    }

    public function getIdPrevision():int{
        return $this->id_prevision;
    }
    public function setIdPrevision($id_prevision):void{
        $this->id_prevision = $id_prevision;
    }
}


?>