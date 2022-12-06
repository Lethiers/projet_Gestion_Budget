<title>comparaison</title>
    <!-- <link rel="stylesheet" href="./asset/css/comparer.css"> -->
    <link rel="stylesheet" href="./asset/css/comparaison.css">
</head>
<body>

<!-- </div> -->

<h1>Page comparaison :</h1>


<div id='global'>

<div class='container-first'>
        <div class='container'>
        
        <div class='tableau'>
            <p>comparer vos dépenses</p>
            <table>
            <tr>
                    <th>Catégorie</th>
                    <th>Prévision</th>
                    <th>Réalité</th>
                </tr>
                <?php foreach($previsionTable as $key => $value):?>
                <tr class='catGlobal'>
                    <?php $idCatGlobal = $key;?>
                    <?php $CategorieGlobal->setIdCatGlobal($idCatGlobal);?>
                    <th><?= $CategorieGlobal->returnNameCatGlobal($bdd)[0]->nom_categorie_global?></th>


                    <td><?= $value?> €</td>
                    <?php
                    $tabloRouge=[];
                    $test = $value;
                    $testKey = $key;
                    $tabloRouge[$key]=$test;
                    ?>
                    <?php foreach($operationTable as $key => $value):?>
                    <?php if($idCatGlobal == $key):?>
                        <?php if($tabloRouge[$key]-$value <= $value):?>
                            <td class='green'><?= $value?>€</td>

                        <?php elseif(0 == $value):?>
                            <td class='green'><?= $value?>€</td>


                        <?php else:?>
                            <td class='red'><?= $value?>€</td>
                        <?php endif;?>
                    <?php endif;?>
                    <?php endforeach;?>
                    </tr>
                        <?php $operation->setidCatUtil($idCatGlobal);?>
                        <?php $operationDetail = $operation->showOperationByIdCatAndUtil($bdd,$debut,$fin);?>
                        <?php foreach($operationDetail as $key => $value):?>
                            <tr class='<?=$idCatGlobal?> hidden'>
                                <th>nom opération</th>
                                <th>montant opération</th>
                            </tr>
                            <tr class='<?=$idCatGlobal?> hidden'>
                                <td><?=$value->nom_operation?></td>
                                <td><?=$value->montant_operation?>€</td>
                            </tr>
                        <?php endforeach;?>
        
                <?php endforeach;?>
        
            </table>
            <a id='retour'>Retour</a>
        </div>
        </div>
    </div>



    <div class='container-first'>
        <div class='container'>
            <img src="./asset/image/gateau.png" alt="">
            <h2>Merci de choisir une prévison</h2>
                <select name="prevision" id="prevision" class='inputComparaison'>
                    <option value="" name='prevision' id='prevision'>Merci de choisir une prévision</option>
                    <?php foreach ($infoPrevision as $key => $value) : ?>
                        <option value="<?=$key?>"><?=$value[0]?></option>
                        <?php endforeach; ?>
                    </select>

                    <h2>choisir la période à comparer</h2>
                    <label for="">date de début</label>
                    <input type="date" name="debut" id="">

                    <label for="">date de fin</label>
                    <input type="date" name="fin" id="">



                    <div class='container-bouton'>
                        <input type="submit" value="choisir" class="bouton">
                    </div>
                    <?= $message ?>
        </div>
    </div>


    <div class='container-first'>
        <div class='container'>
            <p>Vos dépenses :</p>
        <canvas id="graph" aria-label="chart" role="img"></canvas>
        </div>
    </div>

</div>





<script src="./asset/javaScript/afficher_comparaison.js"></script>
<!-- script pour utiliser chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="./asset/javaScript/diagramme.js"></script>



</body>
</html>