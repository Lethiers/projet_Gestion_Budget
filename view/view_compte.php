
    <title>compte</title>
    <link rel="stylesheet" href="./asset/css/compte.css">
    <link rel="stylesheet" href="./asset/css/style.css">
</head>
<body>
    
<h1>Informations compte :</h1>

<div class='container-global'>
    <div class="container-first">
        <div class=container>
                <form action="" method="post">
                    <img id ="test" src="./asset/image/licorneCompte.png" alt="">
                    <p>Modifier les informations de votre comtpe :</p>
                    <label for="nom">nom :</label>
                    <input type="text" name="nom_util" id='nom' value='<?=$util[0]->nom_util?>'>
                    <label for="prenom">prenom :</label>
                    <input type="text" name="prenom_util" id='prenom' value='<?=$util[0]->prenom_util?>'>
                    <label for="pseudo">pseudo :</label>
                    <input type="text" name="pseudo_util" id='pseudo'value='<?=$util[0]->pseudo_util?>'>
                    <div class='container-bouton'>
                    <input type="submit" value="modifier" class="bouton" name='bouton'>
                </div>
                <div class='container-bouton-supprimer'>
                    <input type="submit" value="supprimer" class="bouton" name='supprimer' id='supprimer'>
                    </form>
                </div>
                <p><?=$message?></p>
        </div>
    </div>
    
    <div class="container-first">
        <div class="container">
            <?php if($total<0):?>
            <img src="./asset/image/licorneStop.png" alt="">
            <p>Attention à votre compte !<p>
            <?php else: ?>
            <img src="./asset/image/licorneContent.png" alt="">
            <p>Super vous êtes actuellement en positif !<p>
            <?php endif;?>
            <p>vous avez actuellement gagné <span id="positif"><?=$operationPos?>€</span> et dépensé <span id="negatif"><?=$operationNeg?>€</span>
            <br> vous avez donc <span id="resultat"><?=$operationPos+$operationNeg?>€</span> sur votre compte<p>
        </div>
    </div>    
</div>





<script src="./asset/javaScript/menuCompte.js"></script>

</body>
</html>