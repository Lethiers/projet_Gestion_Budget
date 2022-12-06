    <link rel="stylesheet" href="./asset/css/message.css">
    <title>message</title>
</head>
<body>
    

<div class='containerGlbal'>
    <?php foreach($allForm as $value):?>
        <div class='container-first'>
            <div class='container'>
                <p>nom :</p>
                <p><?=$value->nom_formulaire?></p>
                <p>mail :</p>
                <p><?=$value->email_formulaire?></p>
    
                <p>date :</p>
                <p><?=$value->date_formulaire?></p>
     
                <p>sujet :</p>
                <p><?=$value->sujet_formulaire?></p>
    
                <p>objet :</p>
                <p><?=$value->objet_formulaire?></p>
    
                <p>type demande :</p>
                <p><?=$value->id_type_demande?></p>
    
                <a href="/repondre-message?id=<?=$value->id_formulaire?>" id='repondre'>réponde</a>
                <a href="/supprimer-message?id=<?=$value->id_formulaire?>" id='supp'>supprimer</a>
            </div>
        </div>
    <?php endforeach;?>
</div>

</body>
</html>