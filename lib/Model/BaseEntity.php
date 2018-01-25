<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 23/01/2018
 * Time: 10:28
 */

namespace Banana\Entity;

use Banana\Utility\DB;
use Banana\Utility\Hash;

class BaseEntity
{
    /**
     * @var string Nom de la table
     */
    protected $tableName = '';

    /**
     * @var array Tableau contenant le nom des champs
     */
    protected $fieldNames = [];

    /**
     * @var array Valeurs courantes
     */
    protected $values = [];

    /**
     * @var bool Vérifie si l'entité a été modifiée ou non
     */
    protected $modified;

    // Méthodes particulières
    public function __construct($tableName, $values = [])
    {
        $this->tableName = $tableName;

        // Association des valeurs aux champs
        foreach ($this->fieldNames as $name => $type) {
            if (!array_key_exists($name, $values)) {
                $this->values[$name] = null;
            } else {
                $this->setValue($name, $values[$name]);
//                $this->values[$field] = $values[$field];
            }
        }
    }

    public function __get($field)
    {
        if (array_key_exists($field, $this->values)) {
            return $this->values[$field];
        } else {
            // Throw exception here
        }
    }

    public function __set($field, $value)
    {
        if (array_key_exists($field, $this->values)) {
            $this->setValue($field, $value);
            $this->modified = true;
            $this->update($field);
        } else {
            // Throw exception here
        }
    }

    protected function setValue($field, $value)
    {
        switch ($this->fieldNames[$field]['type']) {
            case 'integer':
                $this->values[$field] = (int) $value;
                break;

            case 'string':
                $this->values[$field] = (string) $value;
                break;

            default:
                $this->values[$field] = (string) $value;
        }
    }

    protected function update(string $fieldToUpdate)
    {
        if ($this->modified == true) {

            $fieldToUpdate .= ' = ' . (gettype($this->values[$fieldToUpdate] ) == 'string' ? "'{$this->values[$fieldToUpdate]}'" : "{$this->values[$fieldToUpdate]}");

            $sth = DB::$C->prepare("UPDATE $this->tableName SET $fieldToUpdate WHERE id = {$this->values['id']}");
            $sth->execute();
        }
    }
}