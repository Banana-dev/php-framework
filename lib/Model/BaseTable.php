<?php

namespace Banana\Model;

use Banana\Exception\NotFoundException;
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

    /**
     * @var string Nom de l'entité
     */
    protected $entityName = '';

    /**
     * @var array Données récupérées
     */
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

        return $this;
    }

    public function first()
    {
        if (count($this->entities) > 0) {
            return $this->entities[0];
        } else {
            return null;
        }
    }

    public function firstOrFail()
    {
        if (count($this->entities) > 0) {
            return $this->entities[0];
        } else {
            throw new NotFoundException('Data not found');
        }
    }

    protected function collectEntities($data)
    {
        $entityClass = 'App\Model\Entity\\' . $this->entityName . 'Entity';
        foreach ($data as $row) {
            $entityClass = 'App\Model\Entity\\' . $this->entityName . 'Entity';
            $this->entities[] = new $entityClass($this->tableName, $row);
        }
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function q(string $sql, array $values = null, string $className = null)
    {
        // Traitement de la chaine
        $instruction = explode(' ', $sql);

        switch (strtoupper($instruction[0])) {
            case 'SELECT':
                // Execution de la req
                $sth = DB::$C->prepare($sql);
                $sth->execute($values);
                return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
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
}