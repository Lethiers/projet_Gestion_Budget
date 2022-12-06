
    <title>modifier operation</title>
    <link rel="stylesheet" href="./asset/css/modifier_operation.css">
</head>
<body>

<h1>Modifier votre opération</h1>
<form action="" method="post">
    <div class="container-first">
        <div class="container">
            <img src="./asset/image/licorneFix.png" alt="">
            <?php foreach($tablo as $value):?>
            <p>Nom de l'operation :</p>
            <input type="text" name="nom_operation" placeholder="<?=$value->nom_operation?>"  value='<?=$value->nom_operation?>'>
            <p>date de l'operation :</p>
            <input type="date" name="date_operation" placeholder="<?=$value->date_operation?>" value='<?=$value->date_operation?>'>
            <p>montant de l'operation :</p>
            <input type="text" name="montant_operation" placeholder="<?=$value->montant_operation?>" value='<?=$value->montant_operation?>'>

            <!-- <p>gagné ou perdu ?</p>
                        <select name="absolu" class="bouton" id='cat-global' required>
                        <option value="+">(+) en plus dans la tirelire</option>
                        <option value="-" selected>(-) les poches sont troués</option>
            </select> -->
            <?php 
            $idCatGlobal = $value->id_categorie_global;
            $idCatUtil = $value->id_categorie_utilisateur;
            ?>

            <?php endforeach;?>
    
            <select name="catGlobal" class="bouton">
                <?php $categorieGlobal->setIdCatGlobal($idCatGlobal) ?>
            <option value="<?=$idCatGlobal?>"><?= $categorieGlobal->returnNameCatGlobal($bdd)[0]->nom_categorie_global?></option>
            <?php foreach($tab as $value):?>
                <option value=<?=$value->id_categorie_global?>><?=$value->nom_categorie_global?></option>
            <?php endforeach;?>
            </select>
    
            <select name="catUtil" class="bouton">
                <?php 
                $categorieUtil->setIdCatUtil($categorieUtilActuelle);
                ?>
                <?php if ($categorieUtilActuelle== null):?>
                    <option value="">Catégorie utilisateur</option>
                <?php else:?>
            <option value="<?=$categorieUtilActuelle?>"><?=$categorieUtil->returnNameCatUtil($bdd)[0]->nom_categorie_utilisateur?></option>
                <?php endif;?>
            <?php foreach($tabUtil as $value):?>
                <option value=<?=$value->id_categorie_utilisateur?>><?=$value->nom_categorie_utilisateur?></option>
            <?php endforeach;?>
            </select>
            <div class='container-bouton'>
                <input type="submit" value="modifier" class="bouton">
            </div>
            <?= $message ?>
        </div>
    </div>
</form>


</body>
</html>