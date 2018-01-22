<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 22/01/2018
 * Time: 11:32
 */

namespace Banana\Table;

use Banana\DB\DB;

new DB;

class BaseTable
{
    // Nom de la table
    protected $tableName = '';

    // Données de la table
    public $data = array();

    function __construct()
    {

    }

    public function __call($name, $arguments) {
        // Split du name à toute les majuscules
        $arr = preg_split('/(?=[A-Z])/', $name, -1, PREG_SPLIT_NO_EMPTY);

        // getByChamps
        if (count($arr) === 3) {
            if ($arr[0] === 'get' && $arr[1] === 'By') {
                var_dump(DB::$C);
                $sth = DB::$C->prepare("SELECT * FROM $this->tableName ORDER BY {$arr[2]}");
                $sth->execute();
                $data = $sth->fetchAll();
            }
        }
    }
}