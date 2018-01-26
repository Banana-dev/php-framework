<?php
if(isset($_COOKIE['lang']))
{
    $lang = $_COOKIE['lang'];
}
else
{
    // si aucune langue n'est déclarée on tente de reconnaitre la langue par défaut du navigateur
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
}

//définition de la durée du cookie (1 an)
$expire = 365*24*3600*10;

//enregistrement du cookie au nom de lang
setcookie('lang', $lang, time() + $expire);

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