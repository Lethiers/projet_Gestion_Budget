<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css menu navigation et footer -->
    <link rel="stylesheet" href="./asset/css/header_disconnect.css">      
    <link rel="stylesheet" href="./asset/css/style.css">
      <!-- menu navigation -->


<header>
  <nav class="navbar afficher-menu">
    <div class="menu">
      <ul class='liste-menu'>
      <li>
        <a href="/acceuil"><img src="./asset/image/licorneArgent.png" alt=""></a>
          </li>
        <li>
          <div class='container-menu'>
            <a href="/inscription" title="par ici pour vous inscrire"><button class='bouton'>inscription</button></a>
        </li>
        <li>
          <div class='container-menu'>
            <a href="/acceuil" title="par ici pour vous connecter"><button class='bouton'>acceuil</button></a>
        </li>
        <li>
          <div class='container-menu'>
            <a href="/connexion" title="par ici pour vous connecter"><button class='bouton'>Connexion</button></a>
        </li>
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
                  <a href="/inscription" class='bouton-menu'>inscription</a>
                  <a href="/acceuil" class='bouton-menu'>acceuil</a>
                  <a href="/connexion" class='bouton-menu'>Connexion</a>
              </div>
            </div>
          <a href="/contact"><img src="./asset/image/licorneVomi.png" alt=""></a>
  </nav>
</header>

<script src="./asset/javaScript/menu.js"></script>

