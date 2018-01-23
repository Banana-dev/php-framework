<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 22/01/2018
 * Time: 12:01
 */

namespace Banana\DB;

use Banana\Utility\Config;



class DB
{
    public static $C;

    public static function initialize()
    {
        $conf = Config::get('db');

        try {
            self::$C = new \PDO( "mysql:host={$conf['host']};dbname={$conf['db']};charset=utf8", "{$conf['username']}", "{$conf['password']}");
        } catch (\PDOException $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}