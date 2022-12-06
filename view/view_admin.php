<link rel="stylesheet" href="./asset/css/admin.css">
    <title>admin</title>
</head>
<body>
<h1>bonjour <?=$_SESSION['pseudo']?></h1>
<div class='container-first'>
    <div class= 'container'>
        <p>trop de droit je méttoufe</p>
        <img src="./asset/image/licorneVomi.png" alt="" id='image'>
        <form action="" method="post">
            <input type="text" name="nom_categorie_global" placeholder="nom categorie">
            <div class='container-bouton'>
                <input type="submit" value="créer" class='bouton'>
            </div>
        </form>
        <p><?=$message?></p>
        <p><?=$msg?></p>
    </div>
</div>
    



    <table>
        <tr>
            <th>nom Categorie</th>
            <th>modifier</th>
            <th>supprimer</th>
        </tr>
        <?php foreach($tab as $value):?>
        <tr>
        <td><?=$value->nom_categorie_global?></td>
        <td><a href="update-prevision-global?id=<?=$value->id_categorie_global?>"><img src="./asset/image/modifier.png" alt="" class='imgLogo'></a></td>
        <td><a href="supprimer-prevision-global?id=<?=$value->id_categorie_global?>"><img src="./asset/image/supprimer.png" alt="" class='imgLogo'></a></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>