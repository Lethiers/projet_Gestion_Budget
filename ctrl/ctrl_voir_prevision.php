<?php
// importation bdd
include './utils/connectBdd.php';
include './utils/function.php';

// importation model
//-----------------model prevision
include './model/model_prevision.php';
//-----------------model cat global
include './model/model_cat_global.php';
//-----------------model cat util
include './model/model_cat_util.php';
//-----------------model avoir
include './model/model_avoir.php';
//-----------------model frequence
include './model/model_frequence.php';
// importation manager
include './manager/mng_cat_global.php';
include './manager/mng_prevision.php';
include './manager/mng_avoir.php';
include './manager/mng_frequence.php';


if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$message ="";

$idUtil = $_SESSION['id'];
// initialise objet prevision
$prevision= new ManagerPrevision();
$prevision->setIdUtil($idUtil);
$allPrevision = $prevision->showprevisionById($bdd,$idUtil);
// instancier obget cat global
$categorieGlobal = new ManagerCategorieGlobal();
// instancier objet avoir
$avoir = new ManagerAvoir();

$frequence = new ManagerFrequence();

// ajout de la view
include './view/view_voir_prevsion.php';
?>