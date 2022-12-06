<?php


class Frequence{
    // attribut
    private $idFrequence;
    private $listeFrequence;

    // constructor
    public function __construct($idFrequence,$listeFrequence){
        $this->idFrequence = $idFrequence;
        $this->listeFrequence = $listeFrequence;
    }

/*------------------------------- 
                    SETTER ET GETTEUR
        -------------------------------*/

    public function getidFrequence():int{
        return $this->idFrequence;
    }
    public function setidFrequence($idFrequence):void{
        $this->idFrequence = $idFrequence;
    }
    public function getlisteFrequence():int{
        return $this->listeFrequence;
    }
    public function setlisteFrequence($listeFrequence):void{
        $this->listeFrequence = $listeFrequence;
    }
}


?>