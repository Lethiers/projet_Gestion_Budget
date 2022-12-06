<?php
// importation bdd
include './utils/connectBdd.php';
include './utils/function.php';
// model categorie global
include './model/model_avoir.php';
include './model/model_prevision.php';
// importation manager
include './manager/mng_avoir.php';
include './manager/mng_prevision.php';

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $prevision = new ManagerPrevision();
    $avoir = new ManagerAvoir();

    $idPrevsion = cleaninput($_GET['id']);
    settype($idPrevsion,'integer');
    
    $avoir->setIdprevision($idPrevsion);
    $prevision->setIdPrevision($idPrevsion);
    
    $avoir->deletePrevision($bdd);
    $prevision->deleteprevision($bdd);

    header('Location: /prevision-voir');   
}
?>