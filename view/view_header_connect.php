<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css menu navigation et footer -->
    <link rel="stylesheet" href="./asset/css/header.css">
    <link rel="stylesheet" href="./asset/css/style.css">

    <script src="./asset/javaScript/menu.js" defer></script>

<header>
  <nav class="navbar afficher-menu">
    <!-- <div id="cache"><img src="./asset/image/gateau.png" alt=""></div> -->

      <!-- <button id="drop-bouton">test</button> -->
        <ul class='liste-menu'>
        <li>
          <a href="/acceuil"><img src="./asset/image/licorneArgent.png" alt=""></a>
        </li>
        <li>
          <div class='container-menu'>
            <a href="/deconnexion" title="vous pouvez vous déconnecté ici"><button class='bouton'>deconnexion</button></a>
          </div>
        </li>
        <li>
        <div class="dropdown">
          <div class='container-menu'>
            <button class='bouton' class="dropbtn">operation</button>
            <div class="dropdown-content">
              <a href="/operation"><button class='bouton'>créer</button></a>
              <a href="/voir-operation"><button class='bouton'>voir</button></a>           
            </div>
          </div>
        </div>
        </li>
        <li>
        <div class="dropdown">
          <div class='container-menu'>
            <button class='bouton' class="dropbtn">prévision</button>
            <div class="dropdown-content">
            <a href="/prevision"><button class='bouton'>créer</button></a>
            <a href="/prevision-voir"><button class='bouton'>voir</button></a>   
            </div>
          </div>
        </div>
        </li>
        <li>
          <div class='container-menu'>
              <a href="/categorie-utilisateur" title="si les catégories globales ne suffisent pas vous pourez toujours vous en créer"><button class='bouton'>categorie</button></a>
          </div>
        </li>
        <li>
          <div class='container-menu'>
              <a href="/comparaison" title="vous pouvez comparer les dépenses prévus avec vos opérations"><button class="bouton">comparer</button></a>
          </div>
        </li>
        <li>
          <div class='container-menu'>
              <a href="/compte" title="vous retrouverez les informations concernant votre compte"><button class="bouton">compte</button></a>
          </div>
        </li>


        <?php 
        $admin = $_SESSION['droit'];
        ?>
        <?php if ($admin == 2):?>
        <li>
          <div class='container-menu'>
              <a href="/admin"><button class="bouton">Admin</button></a>
          </div>
        </li>

        <li>
          <div class='container-menu'>
              <a href="/message"><button class="bouton">message</button></a>
          </div>
        </li>
        <?php endif;?>
        <li>
          <a href="/contact"><img src="./asset/image/licorneVomi.png" alt=""></a>
          </li>



        </ul>
      </div>

  </nav>

  <nav class='cacher'>
  <a href="/acceuil"><img src="./asset/image/licorneArgent.png" alt=""></a>
    <div class="dropdown">
    <button class="dropbtn bouton-menu">Menu</button>
      <div class="dropdown-content">
              <a href="/deconnexion" class='bouton-menu'>deconnexion</a>
              <a href="/operation" class='bouton-menu'>créer opération</a>
              <a href="/voir-operation" class='bouton-menu'>voir opération</a>    
              <a href="/prevision" class='bouton-menu'>créer prévision</a>
              <a href="/prevision-voir" class='bouton-menu'>voir prévision</a>   
              <a href="/categorie-utilisateur" class='bouton-menu'>categorie</a>
              <a href="/comparaison" class='bouton-menu'>comparer</a>
              <a href="/compte" class='bouton-menu'>compte</a>    
              <?php $admin = $_SESSION['droit'];?>
              <?php if ($admin == 2):?>
              <a href="/admin" class='bouton-menu'>Admin</a>
              <a href="/message" class='bouton-menu'>message</a>
              <?php endif;?>
      </div>
    </div>
    <a href="/contact"><img src="./asset/image/licorneVomi.png" alt=""></a>

  </nav>


</header>

<script src="./asset/javaScript/menu.js"></script>

