<?php
// importation bdd
include './utils/connectBdd.php';


include './model/model_cat_global.php';
include './manager/mng_cat_global.php';

include './model/model_avoir.php';
include './manager/mng_avoir.php';

$CategorieGlobal = new ManagerCategorieGlobal(null,null);
$avoir = new ManagerAvoir(null,null,null);

$allAvoir = $avoir->showAllAvoir($bdd);

$nomCategorie=[];
$budgetCategorie=[];

foreach ($allAvoir as $key => $value) {

    $CategorieGlobal->setIdCatGlobal($value->id_categorie_global);

    if (isset($nomCategorie[$value->id_categorie_global])) {
        $nomCategorie[$value->id_categorie_global] = $CategorieGlobal->returnNameCatGlobal($bdd)[0]->nom_categorie_global;
    }else {
        $nomCategorie[$value->id_categorie_global]=$CategorieGlobal->returnNameCatGlobal($bdd)[0]->nom_categorie_global;
    }

    if (isset($budgetCategorie[$value->id_categorie_global])) {
        $budgetCategorie[$value->id_categorie_global] += $value->budget;
    }else {
        $budgetCategorie[$value->id_categorie_global]=$value->budget;
    }
}

$jsonNomCategorie = json_encode($nomCategorie);
$jsonBudgetCategorie = json_encode($budgetCategorie);

// ------- importation des view -----
include './view/view_acceuil.php';

echo '<script>', 'diagramme('.$jsonNomCategorie.','.$jsonBudgetCategorie.');','</script>';
?>