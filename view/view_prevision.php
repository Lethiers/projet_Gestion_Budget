
    <title>prevision</title>
    <link rel="stylesheet" href="./asset/css/prevision.css">
</head>
<body>
    <div class="container-first">
        <div class='container'>
            <form action="" method="post">
                <h2>Créer votre prevision :</h2>
                <?php if ($total<=$montant):?>
                <p>créons votre prévision :</p>
                <img src="./asset/image/licorneInterest.png" alt="">
                <?php else:?>
                <p>vous n'avez pas les moyens :</p>
                <img src="./asset/image/licornePleure.png" alt="">
                <?php endif;?>
                <input type="text" name="name_prevision" placeholder="nom prevision">
                <p>budget de votre prévision :</p>
                <input type="text" name="budget_prevision" placeholder="budget prevision">
                <p>fréquence de votre budget :</p>
                <select name="frequence" class="bouton">
                    <option value="1">jour</option>
                    <option value="2">mois</option>
                    <option value="3">bimestriel</option>
                    <option value="4">trimestriel</option>
                    <option value="5">quadrimestriel</option>
                    <option value="6">semestriel</option>
                    <option value="7">annuel</option>
                </select>
                <?php foreach ($allCatGlobal as $key => $value):?>
                    <label for='<?=$value->id_categorie_global?>'><?=$value->nom_categorie_global?></label>
                    <input type="number" value='0'name="<?=$value->id_categorie_global?>" id="<?=$value->id_categorie_global?>">
                <?php endforeach; ?>
                <div class='container-bouton'>
                    <input type="submit" value="créer" class="bouton" name='bouton'>
                </div>
                <p><?=$message?></p>
            </form>
        </div>
    </div>

</body>
</html>