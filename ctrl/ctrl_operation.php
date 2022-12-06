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
include './manager/mng_cat_util.php';
include './manager/mng_cat_global.php';

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$message = "";
// $operation = new ManagerOperation(null,null,null,null,null);

$idUtil =cleanInput($_SESSION['id']);

// voir les categorie global sous forme de checkbox
$categorieGlobal = new ManagerCategorieGlobal();
$tab = $categorieGlobal->showAllCategorieGlobal($bdd);
$categorieUtil = new ManagerCatUtil();

$categorieUtil->setIdUtil($idUtil);
$tabUtil = $categorieUtil->showCategorieUtil($bdd);


////////////////////////// ENREGISTRER LES OPERATIONS //////////////////////////


if (isset($_POST['nom_operation']) && !empty($_POST['nom_operation']) 
&& isset($_POST['date_operation']) && !empty($_POST['date_operation']) 
&& isset($_POST['montant_operation']) && !empty($_POST['montant_operation'])) {
    
    
    $nom = cleanInput($_POST['nom_operation']);
    $date = cleanInput($_POST['date_operation']);
    $montant = cleanInput($_POST['montant_operation']);
    
    
    
    if (isset($_POST['catUtil']) && !empty($_POST['catUtil'])) {
        
        $catUtil = cleanInput($_POST['catUtil']);
        $operation = new ManagerOperation($date,$montant,$nom,null,$catUtil);
        
        $categorieUtil->setIdUtil($catUtil);
        $categorieGlobalByUtil = $categorieUtil->showCategorieUtilById($bdd);

        $dateOperation = cleanInput($_POST['date_operation']);
        $nomOperation = cleanInput($_POST['nom_operation']);


        if (isset($_POST['absolu'])) {
            $absolu = cleanInput($_POST['absolu']);
        }
        $montantOperation = cleanInput($_POST['montant_operation']);
        $montantOperation = $absolu.$montantOperation;
        settype($montantOperation,'float');

        $idUtil = cleanInput($_SESSION['id']);
        

        $operation->setidCatGlobal($categorieGlobalByUtil[0]->id_categorie_global);
        $operation->setidCatUtil($catUtil);
        $operation->setDate($dateOperation);
        $operation->setMontant($montantOperation);
        $operation->setNom($nomOperation);
        $operation->setIdUtil($idUtil);
        
        // j'enregistre l'operation
        $operation->addOperation($bdd);

    }
    if (isset($_POST['catGlobal']) && !empty($_POST['catGlobal'])){
        
        $catGlobal = cleanInput($_POST['catGlobal']);
        $operation = new ManagerOperation($date,$montant,$nom,$catGlobal,$idUtil);        
        

        $dateOperation = cleanInput($_POST['date_operation']);
        $nomOperation = cleanInput($_POST['nom_operation']);


        if (isset($_POST['absolu'])) {
            $absolu = cleanInput($_POST['absolu']);
        }
        $montantOperation = cleanInput($_POST['montant_operation']);
        $montantOperation = $absolu.$montantOperation;
        settype($montantOperation,'float');


        $idUtil = cleanInput($_SESSION['id']);
        $idCatGlobal = cleanInput($_POST['catGlobal']);


        $operation->setidCatGlobal($idCatGlobal);
        $operation->setidCatUtil(null);
           
        $operation->setDate($dateOperation);
        $operation->setMontant($montantOperation);
        $operation->setNom($nomOperation);
        $operation->setIdUtil($idUtil);
        // j'enregistre l'operation
        $operation->addOperation($bdd);
    }
    
    
    $message = '<p>l\'opération '.$operation->getNom().' pour un montant de '.$operation->getMontant().' est bien enregistré<p>';
    
}else {
    $message= '<p>merci de remplir les champs !</p>';
}



// ------- importation des view -----
include './view/view_operation.php';

?>