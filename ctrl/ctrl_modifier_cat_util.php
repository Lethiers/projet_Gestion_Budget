<?php
// session_start();
// importation bdd
include './utils/connectBdd.php';
// importaiton clean input
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


// voir les categorie global sous forme de checkbox
$categorieGlobal = new ManagerCategorieGlobal();

$catGlobal = $categorieGlobal->showAllCategorieGlobal($bdd);
// recupêration de la cat util par l'id
$catUtil = new ManagerCatUtil();

$idCatUtil = cleanInput($_GET['id']);
settype($idCatUtil,'integer');
$catUtil->setIdCatUtil($idCatUtil);

// pour afficher le nom dans le select
$nameCatUtil = $catUtil->returnNameCatUtil($bdd);

$categorieGlobal->setIdCatGlobal($nameCatUtil[0]->id_categorie_global);
$nameCatGlobal = $categorieGlobal->returnNameCatGlobal($bdd);

if (isset($_GET['id'])) {

    $catUtil->setIdUtil($idCatUtil);
    $tab = $catUtil->showCategorieUtilById($bdd);

    if (isset($_POST['nom_categorie_utilisateur']) && !empty($_POST['nom_categorie_utilisateur']) && isset($_POST['catGlobal']) && !empty($_POST['catGlobal'])) {
        
        $nomCatUtil = cleanInput($_POST['nom_categorie_utilisateur']);
        $idCatGlobal = cleanInput($_POST['catGlobal']);
        settype($idCatGlobal,'integer');

        $idUtil = cleanInput($_SESSION['id']);
        settype($idUtil,'integer');
    
        $catUtil->setNom($nomCatUtil);
        $catUtil->setIdUtil($idUtil);
        $catUtil->setCatGlobal($idCatGlobal);
    
        $catUtil->modifyCatUtil($bdd);
        header('Location: categorie-utilisateur?update');
        
    }
}else{
    header('Location: /categorie-utilisateur');
}


// ------- importation des view -----
include './view/view_modifier_cat_util.php';
?>