<?php
// importation bdd
include './utils/connectBdd.php';
// importation clean input
include './utils/function.php';
// importation model
include './model/model_utilisateur.php';
// importation manager Utilisateur
include './manager/mng_utilisateur.php';
// importation identifiant
include './id_smtp.php';
// ----------- logic ------------

// variable pour envoyer un message à l'utilisateur
$message = "";

if (isset($_POST['nom_util'])&& !empty($_POST['nom_util'])&&
isset($_POST['prenom_util'])&& !empty($_POST['prenom_util'])&&
isset($_POST['email_util'])&& !empty($_POST['email_util'])&&
isset($_POST['pseudo_util'])&& !empty($_POST['pseudo_util'])&&
isset($_POST['mdp_util'])&& !empty($_POST['mdp_util'])
) {
    
    $utilisateur = new ManagerUtilisateur();
    // fonction pour obtenir un tableau assoc pour obtenir les données avec l'email
    $nom = cleanInput($_POST['nom_util']);
    $prenom = cleanInput($_POST['prenom_util']);
    $pseudo = cleanInput($_POST['pseudo_util']);
    $password = cleanInput($_POST['mdp_util']);
    $email = cleanInput($_POST['email_util']);
    
    $utilisateur->setEmail($email);

    $tab = $utilisateur->checkByEmail($bdd);
    
    // on vérifie que l'email 
    if (empty($tab[0]["email_util"])){
        // on vérifie que le pseudo soit libre    
        if (!($tab[0]["pseudo_util"] = "")) {
            
            // option hash mot de passe
            $options = [
                'cost' => 12,
            ];
            
            // hash
            $mdp = password_hash($password, PASSWORD_DEFAULT, $options);
            
            $utilisateur->setNom($nom);
            $utilisateur->setPrenom($prenom);
            $utilisateur->setPseudo($pseudo);
            $utilisateur->setEmail($email);
            $utilisateur->setDroit(1);
            $utilisateur->setValide(0);
            $utilisateur->setMdp($mdp);
            // prepare token
            $hash = md5($email);
            $token = ''.$hash.''.rand(0,999999).'';
            $utilisateur->setToken($token);
            // // création du compte
            // $utilisateur->addUser($bdd);
            
            $subject = 'hello';
            $emailMessage = utf8_decode("<h1>bienvenue à toi ".$utilisateur->getPseudo()."</h1> <p>merci de ton inscription!</p></br>
            <a href='https://fabien.adrardev.fr/activate?id=".$token."'>clique sur le lien pour valider ton inscrition</a>");

            $mail = $utilisateur->sendMail($utilisateur->getEmail(),$subject,$emailMessage,$loginSmtp,$mdpSmtp);
            if ($mail==null) {
                // création du compte
                $utilisateur->addUser($bdd);
                $message = 'message envoyé ! valider votre compte avant de vous connecter';
            }else {
                $message = "problème d'envoie du mail de confirmation";
            }
            
        }else {
            $message = 'pseudo déjà utilisé';
        }
    }else {
        $message = 'email déjà utilisé';
    } 
    // $message = '</br>bienvenue à toi '.$utilisateur->getPseudo().'!';
    
}else {
    $message = 'merci de remplir les champs';
}

// ------- importation des view -----
include './view/view_inscription.php';
?>