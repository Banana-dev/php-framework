<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 22/01/2018
 * Time: 12:01
 */

namespace Banana\DB;

class DB
{
    public static $C;

    public static function initialize()
    {
        // \namespace php
        $config = array("dbname" => "tracks", "user" => "root", "pwd" => "123");
        try {
            $C = new \PDO('mysql:host=localhost;dbname=tracks;charset=utf8', 'root', '123');
            var_dump($C);
        } catch (\PDOException $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}