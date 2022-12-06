<?php
session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    /*--------------------------ROUTER -----------------------------*/
    if ($path === "/api") {
        
    }else{
        if (!empty($_SESSION['connect']) && $_SESSION['connect'] == "ok") {
            include './view/view_header_connect.php';
        }else{
            include './view/view_header.php';
        }

    }

    //test de la valeur $path dans l'URL et import de la ressource
    switch($path){
        //route / acceuil
        case $path === "/acceuil" : 
            include './ctrl/ctrl_acceuil.php';
        break ;

        //route / compte
        case $path === "/compte":
            include './ctrl/ctrl_compte.php';
		break ;
        //route / connexion
        case $path === "/connexion":
            include './ctrl/ctrl_connexion.php';
		break ;
        //route / inscription
        case $path === "/inscription":
            include './ctrl/ctrl_inscription.php';
		break ;

        //route / operation
        case $path === "/operation":
            include './ctrl/ctrl_operation.php';
		break ;


        //route / voir operation
        case $path === "/voir-operation":
            include './ctrl/ctrl_voir_operation.php';
		break ;

        //route / supprimer -- operation
        case $path === "/supprimer-operation":
            include './ctrl/ctrl_supprimer_operation.php';
		break ;

        //route / modifier -- operation
        case $path === "/modifier-operation":
            include './ctrl/ctrl_modifier_operation.php';
		break ;

        // route / deconnexion
        case $path === "/deconnexion":
            include './ctrl/ctrl_deconnexion.php';
		break ;

        // route / contacter
        case $path === "/contact":
            include './ctrl/ctrl_contact.php';
		break ;

        // route / prevision
        case $path === "/prevision":
            include './ctrl/ctrl_ajout_prevision.php';
		break ;
        // route / prevision
        case $path === "/prevision-voir":
            include './ctrl/ctrl_voir_prevision.php';
		break ;

        // route / modifier -- prevision
        case $path === "/modifier-prevision":
            include './ctrl/ctrl_modifier_prevision.php';
        break ;

        // route / supprimer un prevision
        case $path === "/supprimer-prevision":
            include './ctrl/ctrl_supprimer_prevision.php';
        break ;

        // route / supprimer une categorie global
        case $path === "/supprimer-prevision-global":
            include './ctrl/ctrl_supprimer_prevision_global.php';
        break ;


        // route / modifier un prevision
        case $path === "/update-prevision-global":
            include './ctrl/ctrl_modifier_diagramme_global.php';
        break ;


        // route / supprimer categorie utilisateur
        case $path === "/delete-categorie-utilisateur":
            include './ctrl/ctrl_supprimer_cat_util.php';
        break ;


        // route / modifier categorie utilisateur
        case $path === "/update-categorie-utilisateur":
            include './ctrl/ctrl_modifier_cat_util.php';
        break ;

        // route / categorie utilisateur
        case $path === "/categorie-utilisateur":
            include './ctrl/ctrl_cat_util.php';
        break ;

        // route / categorie utilisateur
        case $path === "/comparaison":
            include './ctrl/ctrl_comparaison.php';
        break ;

        // mise en place de l'api
        case $path === "/api":
            include './api.php';
        break ;

        // mise en place activation email
        case $path === "/activate":
            include './ctrl/ctrl_active_account.php';
        break ;

        // route / admin
        case $path === "/admin":
            include './ctrl/ctrl_admin.php';
        break ;

        // route / admin
        case $path === "/message":
            include './ctrl/ctrl_message.php';
        break ;

        // route / admin
        case $path === "/supprimer-message":
            include './ctrl/ctrl_supprimer_message.php';
        break ;
        // route / admin
        case $path === "/repondre-message":
            include './ctrl/ctrl_repondre_message.php';
        break ;

            ///////////////////////////////////TEST////////////////////////////////////////////

        // // route / modifier/supprimer table avoir
        // case $path === "/modifierDepenseGlobal":
        //     include './ctrl/ctrl_modifier_avoir.php';
        // break ;

        // // route / modifier/supprimer table ajouter 
        // case $path === "/modifierDepenseUtil":
        //     include './ctrl/ctrl_modifier_ajouter.php';
        // break ;

///////////////////////////////////TEST////////////////////////////////////////////
    }


    // if ($path === "/api") {
        
    // }else{
        include './view/view_footer.php';

    // }

    
?>
