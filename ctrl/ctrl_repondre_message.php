<?php
// importation bdd et fonction
include './utils/connectBdd.php';
include './utils/function.php';
// importation model
include './model/model_type_demande.php';
include './model/model_formulaire.php';

// importation manager
include './manager/mng_formulaire.php';
include './manager/mng_type_demande.php';

// importation identifiant mail
include './id_smtp.php';


if ($_SESSION['droit'] !== 2) {
    header('Location:acceuil'); 
}

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}



$managerFormulaire = new ManagerFormulaire();



if (isset($_GET['id'])) {

    $idForm = cleanInput($_GET['id']);
    settype($idForm,'integer');
    $managerFormulaire->setIdFormulaire($idForm);
    $email = $managerFormulaire->returnMail($bdd);
}else {
    header('Location:acceuil');
}

if (isset($_POST['sujet'])&&!empty($_POST['sujet']) && isset($_POST['mail'])&&!empty($_POST['mail'])) {
    
    
    //param sujet et contenu du mail
    $mail = $email[0]->email_formulaire;
    $subject = cleanInput($_POST['sujet']);
    $emailMessage = 'Bonjour '.$email[0]->nom_formulaire.', <br> '.cleanInput($_POST['mail']).'';

    $managerFormulaire->sendMail($mail,$subject,$emailMessage,$loginSmtp,$mdpSmtp);

    $managerFormulaire->setisLu(1);
    $managerFormulaire->setLuForm($bdd);

    header('Location:message');
}




include './view/view_repondre_message.php';


?>