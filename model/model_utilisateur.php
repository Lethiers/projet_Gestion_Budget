<?php

class Utilisateur{



/*------------------------------- 
                    ATTRIBUTS
        -------------------------------*/

    private ?int $id;
    private ?string $nom;
    private ?string $prenom;
    private ?string $pseudo;
    private ?string $email;
    private ?string $mdp;
    private ?int $droit;
    private ?bool $valide_util;
    private ?string $token_util;

/*------------------------------- 
                    CONSTRUCTEUR
        -------------------------------*/

    public function __construct(?string $nom,?string $prenom,?string $pseudo,?string $email,?string $mdp,?int $droit,?bool $valide){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->droit = $droit;
        $this->valide_util = 0;
    }

    /*------------------------------- 
                        SETTER ET GETTEUR
            -------------------------------*/
    public function getId():string{
        return $this->id_util;
    }
    public function setId($id):void{
        $this->id_util = $id;
    }     

    public function getDroit():string{
        return $this->droit;
    }

    public function setDroit($droit):void{
        $this->droit = $droit;
    }        

    public function getNom():string{
        return $this->nom_util;
    }
    public function setNom($nom):void{
        $this->nom_util = $nom;
    }

    public function getPrenom():string{
        return $this->prenom_util;
    }
    public function setPrenom($prenom):void{
        $this->prenom_util = $prenom;
    }

    public function getPseudo():string{
        return $this->pseudo;
    }
    public function setPseudo($pseudo):void{
        $this->pseudo = $pseudo;
    }

    public function getEmail():string{
        return $this->email_util;
    }
    public function setEmail($email):void{
        $this->email_util = $email;
    }

    public function getMdp():string{
        return $this->mdp_util;
    }
    public function setMdp($mdp):void{
        $this->mdp_util = $mdp;
    }

    public function getValide():string{
        return $this->valide_util;
    }
    public function setValide(?bool $valideUtil):void{
        $this->valide_util = $valideUtil;
    }

    public function getToken():string{
        return $this->token_util;
    }
    public function setToken(string $token):void{
        $this->token_util = $token;
    }
}

?>