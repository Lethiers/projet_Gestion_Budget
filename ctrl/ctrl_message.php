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



$message ='';

$managerTypeDemande = new ManagerTypeDemande();
$managerFormulaire = new ManagerFormulaire();


$allForm = $managerFormulaire->seeAllFormulaire($bdd);

include './view/view_message.php';
?>