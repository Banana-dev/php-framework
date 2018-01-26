<?php

require_once 'vendor/autoload.php';
use Banana\Utility\DB;
use Banana\Template\Template;

if(isset($argv[1]) && $argv[1] == 'model'){
    if(isset($argv[2])){
       try{
           DB::initialize();
           $req = "SHOW COLUMNS FROM " . $argv[2];
           DB::$C->prepare($req);
           DB::$C->execute($req);

       }catch(Exception $e){
           echo $e->getMessage();
       }

    }else{
        echo "Veuillez renseigner le nom de la table ";
    }

}else{
    echo 'erreur commande';

}
die();
