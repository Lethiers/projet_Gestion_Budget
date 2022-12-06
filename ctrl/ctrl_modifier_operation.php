<?php
// importation bdd
include './utils/connectBdd.php';
// importation clean input
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


$message ="";


$idUtil = cleanInput($_SESSION['id']);

// initialisation objet operation
$operation = new ManagerOperation();
// initialisation objet categorie global
$categorieGlobal = new ManagerCategorieGlobal();
// initialisation objet cat util
$categorieUtil = new ManagerCatUtil();


$idOperation = cleanInput($_GET['id']);

$operation->setIdOperation($idOperation);
$tablo = $operation->showOperation($bdd);

$tab = $categorieGlobal->showAllCategorieGlobal($bdd);


$categorieUtil->setIdUtil($idUtil);
$tabUtil = $categorieUtil->showCategorieUtil($bdd);

$categorieUtilActuelle = $tablo[0]->id_categorie_utilisateur;

$idCatOperation = $operation->showOperation($bdd)[0]->id_categorie_global;


if (isset($_POST['nom_operation'])&& !empty($_POST['nom_operation'])&&
isset($_POST['date_operation'])&& !empty($_POST['date_operation'])&&
isset($_POST['montant_operation'])&& !empty($_POST['montant_operation'])) {
    
    $nom = cleanInput($_POST['nom_operation']);
    $date = cleanInput($_POST['date_operation']);
    $montant = cleanInput($_POST['montant_operation']);
    
    if (isset($_POST['catUtil']) && !empty($_POST['catUtil']) &&
    $_POST['catGlobal'] == $idCatOperation) {
        
        $catUtil = cleanInput($_POST['catUtil']);
        
        $categorieUtil->setIdUtil($catUtil);
        $categorieGlobalByUtil = $categorieUtil->showCategorieUtilById($bdd);
        
        $idCatGlobal = $categorieGlobalByUtil[0]->id_categorie_global;
        
        $operation = new ManagerOperation();  

        $operation->setDate($date);
        $operation->setMontant($montant);
        $operation->setNom($nom);
        $operation->setidCatGlobal($idCatGlobal);        
        $operation->setidCatUtil($catUtil);

        $operation->setIdOperation($idOperation);
        $operation->modifyOperation($bdd);
        
    }else {
        $catGlobal = cleanInput($_POST['catGlobal']);
        
        $operation = new ManagerOperation();  
        

        foreach ($_POST as $key => $value) {
            if ($key === 'nom_operation') {
                $operation->setNom(cleanInput($value));
            }
            if ($key === 'date_operation') {
                $operation->setDate(cleanInput($value));
            }
            if ($key === 'montant_operation') {
                $operation->setMontant(cleanInput($value));
            }
            if ($key === 'catGlobal') {
                $operation->setidCatGlobal(cleanInput($value));
                $operation->setidCatUtil(null);
                

            }
        }

        $operation->setIdUtil(null);

        $operation->setIdOperation($idOperation);
        $operation->modifyOperation($bdd);
    }
    
    $message = 'l\'article '.$nom.' à été modifié !';
    
}

// ------ importation des view -----
include './view/view_modifier_operation.php';

?>