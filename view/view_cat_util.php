
    <title>categorie utilisateur</title>
    <link rel="stylesheet" href="./asset/css/categorie.css">
</head>
<body>
    <h1>Retrouver ici vos catégories personalisés :</h1>
    <div class="container">
        <form action="" method="post">
            <img src="./asset/image/chat.png" alt="">
        <p>Un nom pour votre catégorie ?</p>
        <input type="text" name="nom_categorie_utilisateur" placeholder="nom de votre categorie">
        <p>Il faut la ranger dans une catégorie:</p>

        <select name="catGlobal" class="bouton" id='select-cat'>
        <option value="" >selecitonner une catégorie global</option>
        <?php foreach($tab as $value):?>
            <option value='<?=$value->id_categorie_global?>'><?=$value->nom_categorie_global?></option>
        <?php endforeach;?>
        </select>
        <div class='container-bouton'>
                    <input type="submit" value="modifier" class="bouton">
                    </form>
                </div>
        <?=$message?>
        </div>


        <div id='divCat'>

                <?php foreach($listCatUtil as $value):?>
                <div class="container-first-operation">
                    <div class="container-operation">
                        <img src="./asset/image/licorneBaguette.png" alt="">
                        <h4 for='<?=$value->nom_categorie_utilisateur?>'><?=$value->nom_categorie_utilisateur?> :</h4>
                        <a href="update-categorie-utilisateur?id=<?=$value->id_categorie_utilisateur?>">modifier</a>
                        <a href="delete-categorie-utilisateur?id=<?=$value->id_categorie_utilisateur?>">supprimer</a>

                    </div>
                </div>
                <?php endforeach; ?>

        </div>
    
</body>
</html>