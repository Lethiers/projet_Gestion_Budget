<?php
include './utils/connectBdd.php';
include './utils/function.php';

// importation identifiant mail
include './id_smtp.php';


include './model/model_type_demande.php';
include './model/model_formulaire.php';

include './manager/mng_formulaire.php';
include './manager/mng_type_demande.php';


$message ='';

$managerTypeDemande = new ManagerTypeDemande();
$managerFormulaire = new ManagerFormulaire();


$allTypeDemande = $managerTypeDemande->showAllDemande($bdd);


if (isset($_POST['nom'])&& !empty($_POST['nom'])&&
isset($_POST['email'])&& !empty($_POST['email'])&&
isset($_POST['objet'])&& !empty($_POST['objet']) &&
isset($_POST['text'])&& !empty($_POST['text']) &&
isset($_POST['id_type_demande'])&& !empty($_POST['id_type_demande'])){

    $nom = cleanInput($_POST['nom']);
    $email = cleanInput($_POST['email']);
    $sujet = cleanInput($_POST['objet']);
    $texte = cleanInput($_POST['text']);
    $typeDemande = cleanInput($_POST['id_type_demande']);

    $managerFormulaire->setIdTypeDemande($typeDemande);
    $managerFormulaire->setNomFormulaire($nom);
    $managerFormulaire->setEmailFormulaire($email);
    $managerFormulaire->setSujetFormulaire($sujet);
    $managerFormulaire->setObjetFormulaire($texte);
    $managerFormulaire->setisLu(0);
    $managerFormulaire->setDateFormulaire(date("j, n, Y"));

    $managerFormulaire->addFormulaire($bdd);


    // param sujet et contenu du mail
    $subject = 'retour mail';
    $emailMessage = 'merci de votre message je reviendrai vers vous dès que possible.';


    $managerFormulaire->sendMail($email,$subject,$emailMessage,$loginSmtp,$mdpSmtp);

    $message = 'merci de votre message je vous répondrais dès que possible';

}else {
    $message = 'merci de remplir tout les champs';
}





// importation de la view
include './view/view_contact.php';
?>