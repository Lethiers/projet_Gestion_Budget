
    <title>Document</title>
    <link rel="stylesheet" href="./asset/css/connexion.css">
    <link rel="stylesheet" href="./asset/css/style.css">
</head>

<body>
    <div class="container-first">
        <div class="container">
            <img src="./asset/image/licorneCompte.png" alt="Logo" class="logo"><h2>Inscription</h2>
            <form action="" method="post">
                <p>nom :</p>
                <input type="text" name="nom_util">
                <p>Prénom :</p>
                <input type="text" name="prenom_util">
                <p>Email :</p>
                <input type="mail" name="email_util" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"  require>
                <p>pseudo :</p>
                <input type="text" name="pseudo_util">
                <p>mot de passe :</p>
                <input type="password" name="mdp_util">
                <div class='container-bouton'>
                    <input type="submit" value="créer" class="bouton">
                </form>
            </div>
            <?= $message?>
        </div>
    </div>
</body>
</html>