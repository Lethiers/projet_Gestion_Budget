<link rel="stylesheet" href="./asset/css/admin.css">
</head>
<body>
    <div class='container-first'>
        <div class='container'>
        <p>atttention à ce que tu fait :</p>
        <img src="./asset/image/licorneRire.png" alt="" id='image'>
            <form action="" method="post">
                <?php foreach($tab as $val):?>
                    <label for="<?=$val->id_categorie_global?>">nom categorie :</label>
                    <input type="text" name="nom_categorie_global" id="<?=$val->id_categorie_global?>" value='<?=$val->nom_categorie_global?>' placeholder='<?=$val->nom_categorie_global?>'>
                <input type="submit" value="modifier">
                <?php endforeach;?>
            </form>
        </div>
    </div>
    
</body>
</html>