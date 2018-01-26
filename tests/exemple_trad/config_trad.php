<?php
if(empty($_GET['lang'])){
    $_SESSION['lang'] = "fr";
}else{
    switch($_GET['lang']){
        case "fr":
            $_SESSION['lang'] = "fr";
            break;
        case "en":
            $_SESSION['lang'] = "en";
            break;
        default :
            $_SESSION['lang'] = "fr";
            break;
    }
}

switch($_SESSION['lang']) {
    case "fr":
        $langage = "fr.php";
        break;
    case "en":
        $langage = "en.php";
        break;
}

include($langage);
?>