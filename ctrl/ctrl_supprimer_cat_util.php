<?php
// importation bdd
include './utils/connectBdd.php';
// clean input
include './utils/function.php';
// importation model
include './model/model_cat_util.php';
include './model/model_operation.php';

// manager
include './manager/mng_cat_util.php';
include './manager/mng_operation.php';


if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$categorieUtil = new ManagerCatUtil();
$operation = new ManagerOperation();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = cleanInput($_GET['id']);
    settype($id,'integer');
    $categorieUtil->setIdCatUtil($id);


    $operation->setidCatUtil($id);
    $operation->updateOperation($bdd);



    $categorieUtil->deleteCategorieUtil($bdd);
    header('Location: categorie-utilisateur?supp');
}



?>