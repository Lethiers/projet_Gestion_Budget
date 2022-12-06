<?php
// importation bdd
include './utils/connectBdd.php';
// importation clean input
include './utils/function.php';
// importation model
include './model/model_utilisateur.php';
// importation manager Utilisateur
include './manager/mng_utilisateur.php';

$utilisateur = new ManagerUtilisateur();
// variable pour afficher un message
$message ="";

if (isset($_POST['pseudo_util'])&& !empty($_POST['pseudo_util'])
&& isset($_POST['mdp_util'])&& !empty($_POST['mdp_util'])) {
    
    $pseudo = cleanInput($_POST['pseudo_util']);
    $password = cleanInput($_POST['mdp_util']);
    
    $utilisateur->setPseudo($pseudo);
    $hash = $utilisateur->verrifyPassword($bdd);

    if (!empty($hash)) {
        $mdpUtil = $hash[0]->mdp_util;    

        if (password_verify($password,$mdpUtil)){
            
            $utilisateur->setPseudo($pseudo);
            $utilisateur->setMdp($mdpUtil);

            $connexion = $utilisateur->checkUser($bdd);
            
            if (!empty($connexion)) {
                if ($connexion[0]->valide_util == 1) {
                    $_SESSION['connect'] = "ok";
                    $_SESSION['id'] = $connexion[0]->id_util;
                    $_SESSION['pseudo'] = $connexion[0]->pseudo_util;
                    $_SESSION['droit'] = $connexion[0]->id_droit;
                    header('Location:compte');    
                }else {
                    $message = 'compte non valider vérifier votre mail';
                }
            }else {
                $message = 'votre identifiant ou mot de passe est éroné';  
            }
        }
    }else {
        $message = 'votre identifiant ou mot de passe est éroné'; 
    }
}
else {
    $message = 'merci de remplir les champs';   
}


// ------- importation des view -----
include './view/view_connexion.php';
?>