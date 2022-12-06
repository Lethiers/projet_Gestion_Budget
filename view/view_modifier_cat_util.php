
    
<!-- <link rel="stylesheet" href="./asset/css/categorie.css"> -->
<link rel="stylesheet" href="./asset/css/categorie_update.css">
<title>Document</title>
</head>
<body>
    <h1>Modifier categorie utilisateur</h1>

    <div class='container-first'>
        <div class='container'>
            <img src="./asset/image/licornePoison.png" alt="">
            <form action="" method="post">
                    <select name="catGlobal">
                        <option value="<?=$nameCatUtil[0]->id_categorie_global?>"><?=$nameCatGlobal[0]->nom_categorie_global?></option>
                        <?php foreach($catGlobal as $value): ?>
                        <option value='<?=$value->id_categorie_global?>'><?=$value->nom_categorie_global?></option>
                    <?php endforeach; ?>
                    </select>
                
                <?php foreach ($tab as $value):?>
                    <input type="text" name="nom_categorie_utilisateur" placeholder='<?=$value->nom_categorie_utilisateur?>' value='<?=$value->nom_categorie_utilisateur?>'>
                    <input type="submit" value="modifier la catégorie">
                <?php endforeach; ?>

            </form>
        </div>
    </div>

    
</body>
</html>