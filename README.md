# projet_Gestion_Budget 📊

site pour gérer son budget


Quels est le but du site :

*Apprendre en s'amusant
*Un affichage interactif
*Remplacer le tableau Excel


<pre><code>Pour des raisons de sécurité</code></pre>

Vous devrez créer deux fichiers :

*id_smtp.php **personnellement j'ai choisi Outlook**
`<?php
$mdpSmtp = 'mot de passe';
$loginSmtp = 'mail';
?>`

*./utils/connectBdd.php

`<?php
    //fichier de connexion à la BDD
    $bdd = new PDO('mysql:host=localhost;dbname=dataBaseNom','nom_utilisateur','mot_de_passe',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>`

<https://fabien.adrardev.fr/acceuil>

N’hésite pas à m’envoyer un message depuis le site si tu as besoin de renseignement 😉

