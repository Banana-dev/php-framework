<?php

namespace Banana\Model;

use Banana\Utility\DB;

/**
 * Class BaseTable
 * Classe représentant une table, avec des méthodes génériques
 * pour accéder aux données de cette table.
 *
 * @author lucpi
 * @package Banana\Model
 */
class BaseTable
{
    /**
     * @var string Nom de la table
     */
    protected $tableName = '';

    protected $entityName = 'UserEntity';

    /**
     * @var array Données récupérées
     */
//    public $data = [];
    public $entities = [];

    /**
     * Méthode magique pour certains getters
     *
     * @param string $name Nom du getter
     * @param array $arguments Arguments passés
     */
    public function __call(string $name, array $arguments)
    {
        $data = [];
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
                    $data = $sth->fetchAll();
                }
                break;

            // getByField
            case 3:
                if ($arr[0] === 'get' && $arr[1] === 'By') {
                    $sth = DB::$C->prepare("SELECT * FROM $this->tableName WHERE {$arr[2]} = '{$arguments[0]}'");
                    $sth->execute();
                    $data = $sth->fetchAll();

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
                    $data = $sth->fetchAll();
                }
                break;

            default:
                break;
        }
        $this->collectEntities($data);
    }

    protected function collectEntities($data)
    {
        foreach ($data as $row) {
            $entityClass = 'App\Model\Entity\\' . $this->entityName;
            $this->entities[] = new $entityClass($row);
//            echo '<pre>';
//            var_dump($entities);
//            echo '</pre>';
        }
    }
}