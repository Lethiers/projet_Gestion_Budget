<?php
if ($_SESSION['connect'] !== "ok") {
    header('Location:acceuil'); 
}

include './view/view_api.php';


?>