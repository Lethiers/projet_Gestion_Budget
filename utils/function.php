<?php
function cleanInput($input){
    return htmlspecialchars(strip_tags(trim($input)));
};

?>