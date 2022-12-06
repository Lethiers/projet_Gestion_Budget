<?php
// importation bdd
include './utils/connectBdd.php';
include './utils/function.php';

// importation model
include './model/model_prevision.php';
include './model/model_cat_global.php';
include './model/model_cat_util.php';
include './model/model_avoir.php';
include './manager/mng_cat_global.php';
include './manager/mng_prevision.php';
include './manager/mng_avoir.php';

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$message ="";

// initialise objet prevision
$prevision= new ManagerPrevision();
$prevision->setIdUtil($_SESSION['id']);
// instancier obget cat global
$categorieGlobal = new ManagerCategorieGlobal();
// instancier objet avoir
$avoir = new ManagerAvoir();

$allCatGlobal = $categorieGlobal->showAllCategorieGlobal($bdd);

$total = 0;
$montant =0;

if (isset($_POST['bouton'])) {
    $tableauBudget = [];
    foreach ($_POST as $key => $value) {
        if ($key == 'name_prevision') {
            cleanInput($value);
            $prevision->setNom($value);
        }elseif ($key == 'budget_prevision') {
            cleanInput($value);
            settype($value,'float');
            $prevision->setBudget($value);
            $montant += $value;
        
        }elseif ($key == 'frequence') {
            cleanInput($value);
            settype($value,'int');
            $prevision->setIdFrequence($value);
        
        }elseif ($key == 'bouton') {
            $message = 'prévsion créée';
        }
        else {
            cleanInput($value);
            settype($value,'float');
            $tableauBudget[$key]=$value;
            $total += $value;
        }
    }

    if ($total<=$montant) {
        // ajout de la prevision
        $prevision->addprevision($bdd);
        
        
        // on récupére l'id de la prévision
        $idPrevision = $prevision->getMaxIdByUtil($bdd)[0]->id_prevision;
        
        // j'ajoute les budget
        foreach ($tableauBudget as $key => $value) {
            if ($value != 0) {
                $avoir->setIdprevision($idPrevision);
                $avoir->setIdCat($key);
                $avoir->setBudget($value);
                $avoir->addAvoir($bdd);
            }
            $message = 'prévsion créée avec '.$montant - $total.' € de réserve !!!';
        }
    }else {
        $message = 'votre budget est inférieur à vos dépenses de '.$total - $montant.' € !!!';
    }
}
// ------- importation des view -----
include './view/view_prevision.php';

?>