<?php
// importation bdd //
include './utils/connectBdd.php';
include './utils/function.php';
// importation model
// --------- model utilisateur
include './model/model_utilisateur.php';
// --------- model categorie global
include './model/model_cat_global.php';

// importation manager
include './manager/mng_cat_global.php';


if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


// init cat global
$cat = new ManagerCategorieGlobal();


// on verifie qu'on a bien un id
if (isset($_GET['id']) and !empty($_GET['id'])) {
    
    $idCatGlobal = cleanInput($_GET['id']);
    
    $cat->setIdCatGlobal($idCatGlobal);
    $tab = $cat->showCategorieGlobal($bdd);
    // foreach($tab as $val){
    //     echo '<form action="" method="post">
    //     <input type="text" name="nom_categorie_global" id="" placeholder='.$val->nom_categorie_global.'>
    //     <input type="submit" value="modifier">
    //     </form>';
    // }
    
    if (isset($_POST['nom_categorie_global'])) {
        
        $nomCatGlobal = cleanInput($_POST['nom_categorie_global']);
        
        $cat->setNom($nomCatGlobal);
        $cat->setIdCatGlobal($idCatGlobal);
        $cat->modifyCatGlobal($bdd);
        
        header('Location: admin?modify');
    }
}


// importation view
include './view/view_modifier_cat_global.php';

?>