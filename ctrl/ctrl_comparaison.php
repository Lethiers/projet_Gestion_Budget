<?php
// importation de la bdd
include './utils/connectBdd.php';
// importation fonciton clean input
include './utils/function.php';
// importation des models
include './model/model_utilisateur.php';
include './model/model_avoir.php';
include './model/model_prevision.php';
include './model/model_operation.php';
include './model/model_cat_global.php';
include './model/model_cat_util.php';
// importation manager
include './manager/mng_operation.php';
include './manager/mng_utilisateur.php';
include './manager/mng_cat_global.php';
include './manager/mng_prevision.php';
include './manager/mng_avoir.php';

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$message = "";

if (isset($idPrevision) == false) {
    $message = 'merci de choisir une prévision'; 
    $idPrevision = 0;
}


$idUtil = cleanInput($_SESSION['id']);
$utilisateur = new ManagerUtilisateur();
$utilisateur->setId($idUtil);


// on va utiliser le mng cat global pour obtenir le nom
$CategorieGlobal = new ManagerCategorieGlobal();

$prevision = new ManagerPrevision();
$prevision->setIdUtil($idUtil);

// on viens changer les informations en fonciton de l'id qu'on recoit
if (isset($_POST['prevision'])) {
    $idPrevision = cleanInput($_POST['prevision']);
    settype($idPrevision,"integer");
}



$prevision->setIdPrevision($idPrevision);

$allPrevision =$prevision->innerJoinAvoirByPrevision($bdd);
$nomPrevision = $prevision->showprevisionById($bdd,$idUtil);


$infoPrevision = [];
foreach ($nomPrevision as $key => $value) {
    $infoPrevision[$value->id_prevision] = [$value->nom_prevision,$value->budget_prevision];
}

$previsionTable = [];
foreach ($allPrevision as $key => $value) {
    if (isset($previsionTable[$value->id_categorie_global])) {
        $previsionTable[$value->id_categorie_global] += $value->budget;
    }else {
        $previsionTable[$value->id_categorie_global] = $value->budget;
    }
}

$avoir = new ManagerAvoir();



$operation = new ManagerOperation();
$operation->setIdUtil($idUtil);


if (isset($_POST['debut']) && $_POST['debut'] !==''&& isset($_POST['fin'])&& $_POST['fin'] !=='') {
    $debut = cleanInput($_POST['debut']);
    $fin = cleanInput($_POST['fin']);
    
    $allOperationUtil = $operation->showAllOperationByIdUtilByDate($bdd,$debut,$fin);
}else {

        // je récupére uniquement les opérations du mois
        $anne = date('Y');
        $mois = date('m');
    
        $debut =''.$anne.'-'.$mois.'-1'; 
        $fin = date('Y-m-d');
    
        $allOperationUtil = $operation->showAllOperationByIdUtilByDate($bdd,$debut,$fin);
}


if (empty($allOperationUtil)) {
    $message = 'pas de dépense trouvé pour cette période';
}

$operationTable = [];


// je viens pré remplir mon tableau pour pouvoir afficher zero ero si j'ai pas de dépense
$allCat = $CategorieGlobal->showAllCategorieGlobal($bdd);
foreach ($allCat as $key => $value) {
    $operationTable[$value->id_categorie_global] = 0;
}




foreach ($allOperationUtil as $key => $value) {
    if (isset($operationTable[$value->id_categorie_global])) {
        $operationTable[$value->id_categorie_global] += $value->montant_operation;
    }else {
        $operationTable[$value->id_categorie_global] = $value->montant_operation;
    }
}
$nomOperation = [];
$MontantOperation = [];
foreach ($allOperationUtil as $key => $value) {
    array_push($nomOperation,$value->nom_operation);
    array_push($MontantOperation,$value->montant_operation);
}


$nomOperation = json_encode($nomOperation);
$MontantOperation = json_encode($MontantOperation);


//tableau pour l'affichage

// importation de la view
echo '<form action="" method="post">';
include './view/view_comparaison.php';
echo '</form>';
// -- logical




echo '<script>', 'diagramme('.$nomOperation.','.$MontantOperation.');','</script>';







?>