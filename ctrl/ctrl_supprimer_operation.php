<?php
// importation bdd
include './utils/connectBdd.php';
include './utils/function.php';
// importation model
include './model/model_operation.php';
// importation manager
include './manager/mng_operation.php';
// ------- importation des view -----
include './view/view_suppression_operation.php';


if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$operation = new ManagerOperation();
if (isset($_GET['id']) && !empty($_GET['id'])) {


    $idOperation = cleanInput($_GET['id']);

    $operation->setIdOperation($idOperation);
    $operation->deleteOperation($bdd);
}
header('Location:https://fabien.adrardev.fr/prevision-voir');

?>