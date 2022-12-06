<?php
class ManagerFrequence extends Frequence{

    public function __construct(){
        
    }
// récupérer toutes les fréquences
public function showAllFrequence($bdd){
    try {
        $req=$bdd->prepare('SELECT * FROM frequence');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        die('Erreur :' .$e->getMessage());
    }
}

// récupérer le nom de la fréquence
public function returnNameFrequence($bdd){
    try {
        $req=$bdd->prepare('SELECT liste_frequence FROM frequence where id_frequence =:id_frequence');
        $req->bindValue(':id_frequence',$this->getidFrequence());
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (Exception $e) {
        die('Erreur :' .$e->getMessage());
    }
}


}

?>