<?php

class Formulaire{

    // attribut 
    private $id_formulaire;
    private $nom_formulaire;
    private $email_formulaire;
    private $sujet_formulaire;
    private $objet_formulaire;
    private $isLu;
    private $date_formulaire;

    private $id_type_demande;


    // constructor
    public function __construct($nom_formulaire,$email_formulaire,$sujet_formulaire,$objet_formulaire,
    $isLu,$date_formulaire,$id_type_demande){
        $this->nom_formulaire = $nom_formulaire;
        $this->email_formulaire = $email_formulaire;
        $this->sujet_formulaire = $sujet_formulaire;
        $this->objet_formulaire = $objet_formulaire;
        $this->isLu = $isLu;
        $this->date_formulaire = $date_formulaire;
        $this->id_type_demande = $id_type_demande;
    }


    // getteur et setteur
    public function getIdFormulaire():int{
        return $this->id_formulaire;
    }
    public function setIdFormulaire($id_formulaire):void{
        $this->id_formulaire = $id_formulaire;
    }

    public function getIdTypeDemande():int{
        return $this->id_type_demande;
    }
    public function setIdTypeDemande($id_type_demande):void{
        $this->id_type_demande = $id_type_demande;
    }

    public function getNomFormulaire():string{
        return $this->nom_formulaire;
    }
    public function setNomFormulaire($nom_formulaire):void{
        $this->nom_formulaire = $nom_formulaire;
    }

    public function getEmailFormulaire():string{
        return $this->email_formulaire;
    }
    public function setEmailFormulaire($email_formulaire):void{
        $this->email_formulaire = $email_formulaire;
    }

    public function getSujetFormulaire():string{
        return $this->sujet_formulaire;
    }
    public function setSujetFormulaire($sujet_formulaire):void{
        $this->sujet_formulaire = $sujet_formulaire;
    }

    public function getObjetFormulaire():string{
        return $this->objet_formulaire;
    }
    public function setObjetFormulaire($objet_formulaire):void{
        $this->objet_formulaire = $objet_formulaire;
    }

    public function getisLu():string{
        return $this->isLu;
    }
    public function setisLu($isLu):void{
        $this->isLu = $isLu;
    }

    public function getDateFormulaire():string{
        return $this->date_formulaire;
    }
    public function setDateFormulaire($date_formulaire):void{
        $this->date_formulaire = $date_formulaire;
    }







}











?>