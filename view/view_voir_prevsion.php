
<link rel="stylesheet" href="./asset/css/style.css">
<link rel="stylesheet" href="./asset/css/voir_prevision.css">
    <title>Document</title>
</head>
<body>
    <h1>Voici l'ensemble de vos prévisions :</h1>
</body>





<div class='container-prevision'>
<?php foreach ($allPrevision as $key => $value):?>
    <div class='prevision'>
        <table>
            <h2>nom: <?=$value->nom_prevision?></h2>
            <thead>
                <th>montant prévision</th>
                <th>fréquence</th>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $frequence->setidFrequence($value->id_frequence);
                    ?>
                    <td><?=$value->budget_prevision?> €</td>
                    <td><?=$frequence->returnNameFrequence($bdd)[0]->liste_frequence?></td>
                </tr>
            <thead>
                <th>modifier</th>
                <th>supprimer</th>
            </thead>
            <tr>
                    <td><a href="/modifier-prevision?id=<?=$value->id_prevision?>"><img src="./asset/image/modifier.png" alt="" class='imgLogo'></a></td>
                    <td><a href="/supprimer-prevision?id=<?=$value->id_prevision?>"><img src="./asset/image/supprimer.png" alt="" class='imgLogo'></a></td>
            </tr>
        
                <?php $avoir->setIdprevision($value->id_prevision);?>
                <?php $allInfo = $avoir->showAllAvoirByPrevision($bdd);?>
                <thead>
                    <th>catégorie</th>
                    <th>Montant</th>
                </thead>
                <?php foreach ($allInfo as $key => $value):?>
                <?php $categorieGlobal->setIdCatGlobal($value->id_categorie_global);?>
                <tr>
                    <td><?=$categorieGlobal->returnNameCatGlobal($bdd)[0]->nom_categorie_global?></td>
                    <td><?= $value->budget?> €</td>
                </tr>
        
        
                <?php endforeach?>
            </tbody>
        </table>
    </div>
                <?php endforeach?>
    </div>


</html>