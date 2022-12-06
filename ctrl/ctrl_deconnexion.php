<?php

if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}

session_destroy();
if(isset($_COOKIE['PHPSESSID'])){
    unset($_COOKIE['PHPSESSID']);
}
unset($_SESSION['connect']);
unset($_SESSION['id']);
unset($_SESSION['pseudo']);
unset($_SESSION['droit']);
header('Location:acceuil');
?>