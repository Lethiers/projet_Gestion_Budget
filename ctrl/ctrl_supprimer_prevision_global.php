<?php
// importation bdd //
include './utils/connectBdd.php';
include './utils/function.php';
// importation model
// --------- model utilisateur
// include './model/model_utilisateur.php';
// --------- model categorie global
include './model/model_cat_global.php';
include './model/model_avoir.php';
include './model/model_operation.php';
include './model/model_cat_util.php';


// importation manager
include './manager/mng_cat_global.php';
include './manager/mng_avoir.php';
include './manager/mng_cat_util.php';
include './manager/mng_operation.php';


if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


// init cat global
$cat = new ManagerCategorieGlobal();
$avoir = new ManagerAvoir();
$operation = new ManagerOperation();
$utilCat = new ManagerCatUtil();

$idCatGlobal = cleanInput($_GET['id']);

if (isset($idCatGlobal)) {

    // il faut supprimer totues les operations
    $operation->setidCatUtil($idCatGlobal);
    $operation->deleteOperationByIdCatGlobal($bdd);
    // il faut supprimer totues les liaison avoir
    $avoir->setIdCat($idCatGlobal);
    $avoir->deletePrevisionBycatGlobal($bdd);
    // il faut supprimer totues les liaison categorie utilisateur
    $utilCat->setCatGlobal($idCatGlobal);
    $utilCat->deleteCategorieUtilByIdGlobal($bdd);



    $cat->setIdCatGlobal($idCatGlobal);
    $cat->deleteCategorieGlobal($bdd);

    header('Location:admin?supp');    

}
?>