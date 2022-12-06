<?php
// importation bdd
include './utils/connectBdd.php';
include './utils/function.php';

// importation model
//-----------------model prevision
include './model/model_prevision.php';


//-----------------model avoir
include './model/model_avoir.php';


if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


$avoir = new Avoir();


if (isset($_GET['idprevision']) && !empty($_GET['idprevision']) && isset($_GET['idCat']) && !empty($_GET['idCat'])) {

    $avoir->setIdprevision(cleanInput($_GET['idprevision']));
    $avoir->setIdCat(cleanInput($_GET['idCat']));
    $tablo = $avoir->showAvoirIdCatIdprevision($bdd);

    foreach($tablo as $value){
        echo '<form action="" method="post">
        <input type="text" name="budget" placeholder='.$value->budget.'>';
        
    }
    echo '<input type="submit" value="modifier">';
    echo '</form>';


    $avoir->setIdprevision(cleanInput($_GET['idprevision']));
    $avoir->setIdCat(cleanInput($_GET['idCat']));
    $avoir->setBudget(cleanInput($_POST['budget']));
    $avoir->modifyAvoir($bdd);
    header('Location: prevision');



}else {
    $avoir->setIdCat(cleanInput($_GET['idCat']));
    $avoir->setIdprevision(cleanInput($_GET['suppprevision']));
    $avoir->deleteAvoirIdCatIdprevision($bdd);
    header('Location: prevision');
}




?>