<?php

namespace Banana\Controller;

use Banana\Utility\DB;
/**
 * Class BaseController
 * Controleur de base
 *
 * @package Banana\Controller
 */
class BaseController
{
    public function q (string $sql, array $values = null)
    {
        // Traitement de la chaine
        $instruction = explode(' ', $sql);

        switch (strtoupper($instruction[0])) {
            case 'SELECT':
                // Execution de la req
                $sth = DB::$C->query($sql);
                return $sth->fetchAll(\PDO::FETCH_CLASS);
                break;

            case 'INSERT':
                // Execution de la req
                $sth = DB::$C->prepare($sql);
                $sth->execute($values);
                return DB::$C->lastInsertId();
                break;

            case 'UPDATE':
                // Execution de la req
                $sth = DB::$C->prepare($sql);
                $sth->execute($values);
                return $sth->rowCount();
                break;

            case 'DELETE':
                // Execution de la req
                $sth = DB::$C->prepare($sql);
                $sth->execute($values);
                return $sth->rowCount();
                break;

            default:
                return null;
                break;
        }
    }

    public function pre($s)
    {
        echo '<pre>';
        var_dump($s);
        echo '</pre>';
    }
}