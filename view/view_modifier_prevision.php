
    <title>modifier prevision</title>
    <link rel="stylesheet" href="./asset/css/modifier_prevision.css">
</head>
<body>
<div class="container-first">
        <div class='container'>
            <form action="" method="post">
                <p>je n'aime pas être modifier :</p>
                <img src="./asset/image/licorneSeriously.png" alt="">
                <?php foreach ($allPrevision as $key => $value):?>
                <p>nom prévision :</p>
                <input type="text"name='nom_prevision' value='<?=$value->nom_prevision?>'>
                <p>montant :</p>
                <input type="number" name='budget_prevision'value='<?=$value->budget_prevision?>'>
                <?php $idFrequenceCours = $value->id_frequence?>
                <?php endforeach;?>

                <p>fréquence :</p>
                <select name="frequence" id="">
                    <option value="<?=$idFrequenceCours?>">changer fréquence</option>
                    <?php foreach($allFrequence as $value): ?>
                    <option value="<?=$value->id_frequence?>"><?=$value->liste_frequence?></option>
                    <?php endforeach;?>
                </select>

                <?php foreach($allAvoir as $value): ?>
                    <?php $categorieGlobal->setIdCatGlobal($value->id_categorie_global)?>
                    <label for=""><?=$categorieGlobal->returnNameCatGlobal($bdd)[0]->nom_categorie_global?></label>
                    <input type="text" name='<?=$value->id_categorie_global?>' value='<?=$value->budget?>'>
                <?php endforeach; ?>

                <div class='container-bouton'>
                    <input type="submit" value="Enregistrer" class="bouton" name='bouton'>
                </div>
                <p><?=$message?></p>
            </form>
        </div>
    </div>


</body>
</html>