<?php
// importation bdd et fonction
include './utils/connectBdd.php';
include './utils/function.php';
// importation model
include './model/model_utilisateur.php';
include './model/model_cat_global.php';

// importation manager
include './manager/mng_cat_global.php';

if ($_SESSION['droit'] !== 2) {
    header('Location:acceuil'); 
}

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}


// --- LOGICAL
$message = "";
// initialisation du model
$cat = new ManagerCategorieGlobal();
if (isset($_POST['nom_categorie_global'])&& !empty($_POST['nom_categorie_global'])) {
    
    $nomCat = cleanInput($_POST['nom_categorie_global']);


    $cat->setNom($nomCat);
    $cat->addCategorieUtil($bdd);
    
    $message = 'la catégorie '.$cat->getNom().' viens d\'etre créé';
}else {
    $message = "merci de remplir les champs";
}

$tab = $cat->showAllCategorieGlobal($bdd);


// on utilise le retour du ctrl delete pour afficher un message de suppression
$msg = "";
if (isset($_GET['supp'])) {
    $msg = "la catégorie viens d'être supprimer";
}

if (isset($_GET['modify'])) {
    $msg = "la catégorie viens d'être modifier";
}

// ------- importation des view -----
include './view/view_admin.php';
?>