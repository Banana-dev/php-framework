<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 23/01/2018
 * Time: 10:28
 */

namespace Banana\Entity;

use Banana\DB\DB;
new DB;

class BaseEntity
{
    // Nom des champs
    protected $fieldNames = [];
    protected $values = [];
    protected $status;

    // Méthodes particulières
    public function __construct($tablename, $row)
    {
        // Récupération des champs
        $sth = DB::$C->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '{$tablename}'");
        $sth->execute();
        $this->fieldNames = $sth->fetchAll(\PDO::FETCH_COLUMN);

        // Association des valeurs aux champs
        foreach ($this->fieldNames as $field) {
            if (!array_key_exists($field, $row)) {
                $this->values[$field] = '';
            } else {
                $this->values[$field] = $row[$field];
            }
        }
    }

    public function __get($field)
    {
        if (array_key_exists($field, $this->values)) {
            return $this->values[$field];
        } else {
            // Throw excreption here
        }
    }

    public function __set($field, $value)
    {
        if (array_key_exists($field, $this->values)) {
            $this->values[$field] = $value;
        } else {
            // Throw exception here
        }
    }
}