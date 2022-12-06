
    <title>operation</title>
    <link rel="stylesheet" href="./asset/css/operation.css">
</head>
<body>
    <!-- <form action="" method="post"> -->
        <h1>Enregistrer vos opérations :</h1>
        <form action="" method="post">
            <div class="container-first">
                <div class="container">
                        <img src="./asset/image/licorneArgent.png" alt="">
                        <p>Nom de l'operation :</p>
                        <input type="text" name="nom_operation" required>
                        <p>date de l'operation :</p>
                        <input type="date" name="date_operation" required>
                        <p>montant de l'operation :</p>
                        <input type="text" name="montant_operation">  
                        <p>gagné ou perdu ?</p>
                        <select name="absolu" class="bouton" id='cat-global' required>
                        <option value="+">(+) en plus dans la tirelire</option>
                        <option value="-" selected>(-) les poches sont troués</option>
                        </select>

                        <p>il faut choisir une catégorie :</p>
                        <select name="catGlobal" class="bouton" id='cat-global'>
                        <option value="">catégorie global</option>
                        <?php foreach($tab as $value):?>
                        <option value='<?=$value->id_categorie_global?>'><?=$value->nom_categorie_global?></option>
                        <?php endforeach;?>
                        </select>
                        <p>vous préferez vos catégories ?</p>
                        <select name="catUtil" class="bouton" id='cat-util'>
                        <option value="">catégorie utilisateur</option>
                        <?php foreach($tabUtil as $value): ?>
                        <option value='<?=$value->id_categorie_utilisateur?>'><?=$value->nom_categorie_utilisateur?></option>
                        <?php endforeach;?>
                        </select>
                        <div class='container-bouton'>
                            <input type="submit" value="Enregistrer" class="bouton">
                        </div>
                        <?= $message?>
                    </div>
                </div>
        </form>
    <!-- </form> -->
</body>
</html>