
    <title>Contact</title>
    <link rel="stylesheet" href="./asset/css/style.css">
    <link rel="stylesheet" href="./asset/css/contact.css">
</head>
<body>
    
        <div class="container-first">
            <div class="container"> 
                <form action="" method="post">
                <img src="./asset/image/licorneInterogate.png" alt="Logo" id="logo">
                <h2>Formulaire de contact :</h2>
                    <label for="">Nom :</label>
                    <input type="text" name="nom" id="" placeholder="Laurent">
                    <label for="">Email :</label>
                    <input type="email" name="email" id="" placeholder="exemple@gmail.com">

                    <label for="">objet :</label>
                    <input type="text" name="objet" id="" placeholder="objet">

                    <label for="texte">Contenu :</label>
                    <textarea name="text" id="" cols="30" rows="10" id='texte'>Bonjour,</textarea>

                    <select name="id_type_demande" id="" class="bouton">
                    <option value="" name='id_type_demande' id=''>choisir une catégorie</option>
                        <?php foreach($allTypeDemande as $value):?>
                        <option value="<?=$value->id_type_demande?>"><?=$value->nom_type_demande?></option>
                        <?php endforeach; ?>
                    </select>

                    <div class='container-bouton'>
                        <input type="submit" value="envoyer" class="bouton">
                    </div>
                    <p><?=$message?></p>
                </form>
            </div>
    </div>

</body>
</html>