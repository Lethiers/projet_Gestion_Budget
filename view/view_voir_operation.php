    <title>operation</title>
    <link rel="stylesheet" href="./asset/css/voir_operation.css">
</head>
<body>
<h1>Voici la liste de vos opérations :</h1>


<div class='global'>
    <div class='container-first'>
        <div class='container'>
            <form action="" method="post">
                <img src="./asset/image/licornePleure.png" alt="">
                <label for="search">Vous pouvez rechercher le nom d'une operation :</label>
                <input type="text" name="nom_operation" id="search">
                <div class='container-bouton'>
                    <input type="submit" value="chercher" class='bouton'>
                </div>
            </form>
        </div>
    </div>
    
    
    <div class='container-first'>
        <div class='container'>
            <form action="" method="post">
                <img src="./asset/image/licorneInterogate.png" alt="">
                <label for="search">sinon on peut choisir une période :</label>
                <p>date de début</p>
                <input type="date" name="debut" id="">
                <p>date de fin</p>
                <input type="date" name="fin" id="">
                <div class='container-bouton'>
                    <input type="submit" value="chercher" class='bouton' name='periode'>
                </div>
            </form>
        </div>
    </div>
</div>


    <?=$message?>
    <table class='afficher'>
        <thead>
            <tr>
                <th>Nom de l'opération</th>
                <th>date</th>
                <th>montant</th>
                <th>catégorie</th>
                <th>modifier</th>
                <th>supprimer</th>
            </tr>
        </thead>
        <?php foreach($operation as $value) : ?>
            <tr>
                <td><?= $value->nom_operation?></td>
                <?php 
                $date=$value->date_operation;
                // $date =date_format('d-m-Y',$date);
                ?>
                <td><?= $date?></td>
                <td><?= $value->montant_operation?></td>
                <?php if($value->id_categorie_utilisateur != null):?>
                    <?php 
                    $managerCatUtil->setIdCatUtil($value->id_categorie_utilisateur);
                        ?>
                <td><?= $managerCatUtil->returnNameCatUtil($bdd)[0]->nom_categorie_utilisateur?></td>
                <?php else:?>
                    <?php
                        $managerCatGlobal->setIdCatGlobal($value->id_categorie_global);
                        ?>
                    <td><?= $managerCatGlobal->returnNameCatGlobal($bdd)[0]->nom_categorie_global?></td>
                <?php endif;?>
                <td><a href="modifier-operation?id=<?=$value->id_operation?>"><img src="./asset/image/modifier.png" alt="" class='imgLogo'></a></td>
                <td><a href="supprimer-operation?id=<?=$value->id_operation?>"><img src="./asset/image/supprimer.png" alt="" class='imgLogo'></a></td>
            </tr>
        <?php endforeach;?>
    </table>

    <?php foreach($operation as $value) : ?>
    <table class='cacher'>
        <tbody>
            <tr>
                <th>nom de l'operation</th>
                <td><?= $value->nom_operation?></td>
            </tr>
            <tr>
                <th>date</th>
                <td><?= $date?></td>
            </tr>
            <tr>
                <th>montant</th>
                <td><?=$value->montant_operation?> €</td>
            </tr>
            <tr>
                <th>catégorie</th>
                <?php if($value->id_categorie_utilisateur != null):?>
                        <?php $managerCatUtil->setIdCatUtil($value->id_categorie_utilisateur);?>
                    <td><?= $managerCatUtil->returnNameCatUtil($bdd)[0]->nom_categorie_utilisateur?></td>
                    <?php else:?>
                        <?php $managerCatGlobal->setIdCatGlobal($value->id_categorie_global);?>
                        <td><?= $managerCatGlobal->returnNameCatGlobal($bdd)[0]->nom_categorie_global?></td>
                    <?php endif;?>
            </tr>
            <tr>
                <th>moddifier</th>
                <td><a href="modifier-operation?id=<?=$value->id_operation?>"><img src="./asset/image/modifier.png" alt="" class='imgLogo'></a></td>
            </tr>
            <tr>
                <th>supprimer</th>
                <td><a href="supprimer-operation?id=<?=$value->id_operation?>"><img src="./asset/image/supprimer.png" alt="" class='imgLogo'></a></td>
            </tr>
        </tbody>
    </table>
<?php endforeach;?>

    <script src="./asset/javaScript/tableau.js"></script>
</body>
</html>