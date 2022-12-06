
    <title>Connexion</title>
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="./asset/css/connexion.css">
</head>
<body>

        <div class="container-first">
            <div class="container">    
                <div class="container-logo"><img src="./asset/image/licorneArgent.png" alt="Logo" class="logo"></div>
                <h2>Connexion</h2>
                <form action="" method="post">
                    <p>Pseudo :</p>
                    <input type="text" name="pseudo_util">
                    <p>Mot de passe :</p>
                    <input type="password" name="mdp_util">
                    <div class='container-bouton'>
                    <input type="submit" value="connexion" class="bouton">
                    </form>
                </div>
                <?= $message?>
            </div>
        </div>
</body>
</html>

