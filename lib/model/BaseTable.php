<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 22/01/2018
 * Time: 11:32
 */

namespace Banana\Table;

use Banana\Utility\DB;

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

        switch (count($arr)) {
            case 1:
                break;

            // getAll
            case 2:
                if ($arr[0] === 'get' && $arr[1] === 'All') {
                    $sth = DB::$C->prepare("SELECT * FROM $this->tableName");
                    $sth->execute();
                    $this->data = $sth->fetchAll();
                }
                break;

            // getByField
            case 3:
                if ($arr[0] === 'get' && $arr[1] === 'By') {
                    $sth = DB::$C->prepare("SELECT * FROM $this->tableName WHERE {$arr[2]} = '{$arguments[0]}'");
                    $sth->execute();
                    $this->data = $sth->fetchAll();
                }
                break;

            // getByFieldOrderBy
            case 5:
                if ($arr[0] === 'get' && $arr[1] === 'By' && $arr[3] === 'Order' && $arr[4] === 'By') {
                    $sth = DB::$C->prepare("
                                    SELECT * 
                                    FROM $this->tableName 
                                    WHERE {$arr[2]} = '{$arguments[0]}'
                                    ORDER BY {$arguments[1]} {$arguments[2]}");
                    $sth->execute();
                    $this->data = $sth->fetchAll();
                }
                break;

            default:
                break;
        }
    }
}