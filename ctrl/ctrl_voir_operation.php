<?php
// importation bdd
include './utils/connectBdd.php';
// importation de fonciton
include './utils/function.php';

// importation model
include './model/model_operation.php';
include './model/model_cat_global.php';
include './model/model_cat_util.php';



// importation manager
include './manager/mng_operation.php';
include './manager/mng_cat_global.php';
include './manager/mng_cat_util.php';

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$managerCatGlobal = new ManagerCategorieGlobal();
$managerCatUtil = new ManagerCatUtil();
$managerOperation = new ManagerOperation();

// variable pour écrire des messages
$message ="";
// variables pour enregistrer des opérations
$operation = "";

if (isset($_POST['nom_operation'])) {
    $recherche = cleanInput($_POST['nom_operation']);
    $id = cleanInput($_SESSION['id']);
    settype($id,'integer');

    $managerOperation->setIdUtil($id);
    $operation =$managerOperation->searchOperation($bdd,$recherche);
}else {
    $managerOperation->setIdUtil($_SESSION['id']);

    // je récupére uniquement les opérations du mois
    $anne = date('Y');
    $mois = date('m');

    $debut =''.$anne.'-'.$mois.'-1'; 
    $fin = date('Y-m-d');

    $operation = $managerOperation->showAllOperationByIdUtilByDate($bdd,$debut,$fin);
}

// recupérer opération operation par date
if (isset($_POST['periode'])) {
    if (!empty($_POST['debut']) && !empty($_POST['fin'])) {
        $debut = cleanInput($_POST['debut']);
        $fin = cleanInput($_POST['fin']);
        $operation = $managerOperation->showAllOperationByIdUtilByDate($bdd,$debut,$fin);
    }else {
        $message = 'merci de choisir des dates';
    }
}


// ------- importation des view -----
include './view/view_voir_operation.php';
?>