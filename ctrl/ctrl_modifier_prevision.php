<?php

// importation bdd
include './utils/connectBdd.php';
include './utils/function.php';
// importation model

//-----------------model prevision
include './model/model_prevision.php';
include './model/model_cat_global.php';
include './model/model_avoir.php';
include './model/model_frequence.php';
//-----------------model prevision
include './manager/mng_prevision.php';
include './manager/mng_cat_global.php';
include './manager/mng_avoir.php';
include './manager/mng_frequence.php';


if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$message = "";

// instanciaiton obj
$categorieGlobal = new ManagerCategorieGlobal();
$prevision = new ManagerPrevision();
$avoir = new ManagerAvoir();
$frequence = new ManagerFrequence();

if (isset($_GET['id'])) {
    $idPrevision = cleanInput($_GET['id']);

    $avoir->setIdprevision($idPrevision);
    $allAvoir = $avoir->showAllAvoirByPrevision($bdd);
    
    $prevision->setIdPrevision($idPrevision);

    $allPrevision = $prevision->showprevision($bdd);

    $allFrequence = $frequence->showAllFrequence($bdd);
}else {
    header('Location: /prevision-voir');
}

$total = 0;
$montant =0;


if (isset($_POST['bouton'])) {
    $tableauBudget = [];
    foreach ($_POST as $key => $value) {
        if ($key == 'nom_prevision') {
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

        $prevision->modifyprevision($bdd);

        foreach ($tableauBudget as $key => $value) {
            if ($value != 0) {
                $avoir->setIdprevision($idPrevision);
                $avoir->setIdCat($key);
                $avoir->setBudget($value);
                $avoir->modifyAvoir($bdd);
            }
            $message = 'prévsion créée avec '.$montant - $total.' € de réserve !!!';
        }


    }else {
        $message = 'votre budget est inférieur à vos dépenses de '.$total - $montant.' € !!!';
    }

}











include './view/view_modifier_prevision.php';
?>