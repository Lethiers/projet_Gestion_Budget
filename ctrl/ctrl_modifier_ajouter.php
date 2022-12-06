<?php
// importation bdd
include './utils/connectBdd.php';

// importation model
//-----------------model prevision
include './model/model_prevision.php';
//-----------------model ajouter
// importation manager
include './manager/mng_prevision.php';



if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$ajouter = new Ajouter();


if (isset($_GET['idprevision']) && !empty($_GET['idprevision']) && isset($_GET['idCat']) && !empty($_GET['idCat'])) {

    $tablo = $ajouter->showAjouterIdCatIdprevision($bdd,$_GET['idCat'],$_GET['idprevision']);

    foreach($tablo as $value){
        echo '<form action="" method="post">
        <input type="text" name="budget" placeholder='.$value->budget.'>';
        
    }
    echo '<input type="submit" value="modifier">';
    echo '</form>';


    $ajouter->setIdprevision($_GET['idprevision']);
    $ajouter->setIdCat($_GET['idCat']);
    $ajouter->setBudget($_POST['budget']);
    $ajouter->modifyAjouter($bdd);
    header('Location: prevision');



}else {
    $ajouter->deleteAjouterIdCatIdprevision($bdd,$_GET['idCat'],$_GET['suppprevision']);
    header('Location: prevision');
}




?>