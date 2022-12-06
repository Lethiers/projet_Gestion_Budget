<?php
include './utils/connectBdd.php';
include './utils/function.php';

include './model/model_formulaire.php';

include './manager/mng_formulaire.php';

if ($_SESSION['droit'] !== 2) {
    header('Location:acceuil'); 
}

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


if (isset($_GET['id'])) {

    $id = cleanInput($_GET['id']);
    settype($id,'integer');

    $managerFormulaire = new ManagerFormulaire();
    $managerFormulaire->setisLu(1);
    $managerFormulaire->setIdFormulaire($id);
    $managerFormulaire->setLuForm($bdd);
    header('Location:message');
}else {
    header('Location:acceuil');
}

?>