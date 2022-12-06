<?php
// importation bdd
include './utils/connectBdd.php';
// importation clean input
include './utils/function.php';

// importation model
include './model/model_cat_util.php';
include './model/model_cat_global.php';

// importation manager
include './manager/mng_cat_util.php';
include './manager/mng_cat_global.php';


if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$categorieUtil = new ManagerCatUtil();

$message = "";
$idUtil = cleanInput($_SESSION['id']);

// voir les categorie global sous forme de checkbox
$categorieGlobal = new ManagerCategorieGlobal();
$tab = $categorieGlobal->showAllCategorieGlobal($bdd);
    
    
    if (isset($_POST['nom_categorie_utilisateur']) && !empty($_POST['nom_categorie_utilisateur']) && isset($_POST['catGlobal']) && !empty($_POST['catGlobal']) ) {
        
        $nomCatUtil = cleanInput($_POST['nom_categorie_utilisateur']);
        $nomCatGlobal = cleanInput($_POST['catGlobal']);
        
        $categorieUtil->setNom($nomCatUtil);
        $categorieUtil->setIdUtil($idUtil);
        $categorieUtil->setCatGlobal($nomCatGlobal);

        $categorieUtil->addCategorieUtil($bdd);
        
        
        $message = 'la categorie '.$categorieUtil->getNom().' viens d\'etre créer';
    }else {
        $message = "merci de remplir les champs";
}

// montrer la liste des categorie utilisateur créer
$categorieUtil->setIdUtil($idUtil);
$listCatUtil = $categorieUtil->showCategorieUtil($bdd);

// ------- importation des view -----
include './view/view_cat_util.php';
?>