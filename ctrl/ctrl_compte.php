<?php
// importation bdd
include './utils/connectBdd.php';
include './utils/function.php';
// importation model
include './model/model_utilisateur.php';
include './model/model_operation.php';
include './model/model_prevision.php';
include './model/model_cat_util.php';
include './model/model_avoir.php';
// importation manager
include './manager/mng_operation.php';
include './manager/mng_utilisateur.php';
include './manager/mng_prevision.php';
include './manager/mng_cat_util.php';
include './manager/mng_avoir.php';

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$message = '';

$idUtil = cleanInput($_SESSION['id']);

$utilisateur = new ManagerUtilisateur();
$utilisateur->setId($idUtil);

$operation = new ManagerOperation();
$operation->setIdUtil($idUtil);

$prevision = new ManagerPrevision();
$prevision->setIdUtil($idUtil);

$catUtil = new ManagerCatUtil();
$catUtil->setIdUtil($idUtil);

$avoir = new ManagerAvoir();



$util = $utilisateur->showUser($bdd);

if (isset($_GET['utiliser'])) {
    $message = 'informations déjà utilisés !!';
}



// formulaire pour modifier l'utilisateur
if (isset($_POST['bouton'])) {
    if (isset($_POST['nom_util']) && !empty($_POST['nom_util']) &&
    isset($_POST['prenom_util']) && !empty($_POST['prenom_util']) &&
    isset($_POST['pseudo_util']) && !empty($_POST['pseudo_util'])) {
    
        $prenom = cleanInput($_POST['prenom_util']);
        $nom = cleanInput($_POST['nom_util']);
        $pseudo = cleanInput($_POST['pseudo_util']);
    
    
        $allUser = $utilisateur->showAllUser($bdd);
    
        $nomUser =[];
        $prenomUser =[];
        $pseudoUser =[];
        foreach($allUser as $key => $value){
            if ($value->nom_util) {
                array_push($nomUser,$value->nom_util);
            }
            if ($value->prenom_util) {
                array_push($prenomUser,$value->prenom_util);
            }
            if ($value->pseudo_util) {
                array_push($pseudoUser,$value->pseudo_util);
            }
        }        


        if (!in_array($nom,$nomUser)) {
            $utilisateur->setNom($nom);
        }else {
            $utilisateur->setNom($util[0]->nom_util);
        }
        if (!in_array($prenom,$prenomUser)) {
            $utilisateur->setPrenom($prenom);
        }else {
            $utilisateur->setPrenom($util[0]->prenom_util);
        }
        if (!in_array($pseudo,$pseudoUser)) {
            $utilisateur->setPseudo($pseudo);
        }else {
            $utilisateur->setPseudo($util[0]->pseudo_util);
        }

        $utilisateur->setId($idUtil);

        $utilisateur->modifyUser($bdd);
        header('Location:compte');
 
    }
}

// div pour afficher les dépense en cours
$tabloOpTotalPos = [];
$tabloOpTotalNeg = [];

$tabloOperation = $operation->showAllOperationByIdUtil($bdd);

foreach($tabloOperation as $value){
    if ($value->montant_operation > 0) {
        array_push($tabloOpTotalPos,$value->montant_operation);
    }
    if ($value->montant_operation < 0) {
        array_push($tabloOpTotalNeg,$value->montant_operation);
    }
}
$operationPos = array_sum($tabloOpTotalPos);
$operationNeg = array_sum($tabloOpTotalNeg);
$total = $operationNeg + $operationPos;



// on va vouloir supprimer les informations de l'utilisateur
if (isset($_POST['supprimer'])) {

    $allPrevision = $prevision->showprevisionById($bdd);

    foreach ($allPrevision as $key => $value) {
        $avoir->setIdprevision($value->id_prevision);
        $avoir->deletePrevision($bdd);
    }

    $operation->deleteOperationByUtil($bdd);
    $prevision->deletePrevisionByUtil($bdd);


    $catUtil->deleteCategorieUtilByIdUtil($bdd);
    $utilisateur->deleteUser($bdd);

    header('Location:deconnexion');


}

// ------- importation des view -----
include './view/view_compte.php';
?>