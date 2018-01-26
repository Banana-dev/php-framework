<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 23/01/2018
 * Time: 10:28
 */

namespace Banana\Entity;

use Banana\Utility\DB;

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

    /**
     * BaseEntity constructor.
     * @param $tableName Nom de la table
     * @param array $values Valeurs à associer
     */
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

    /**
     * @param $field Champ
     * @return mixed Valeur associée au champ
     */
    public function __get($field)
    {
        if (array_key_exists($field, $this->values)) {
            return $this->values[$field];
        } else {
            // Throw exception here
        }
    }

    /**
     * @param $field Champ
     * @param $value Valeur à associer au champ
     */
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

    /**
     * Associe la valeur au champ en prenant en compte le type défini dans la classe fille
     * @param $field Champ
     * @param $value Valeur à associer
     */
    protected function setValue($field, $value)
    {
        switch ($this->fieldNames[$field]['type']) {
            case 'integer':
                $this->values[$field] = (int)$value;
                break;

            case 'string':
                $this->values[$field] = (string)$value;
                break;

            default:
                $this->values[$field] = (string)$value;
        }
    }

    /**
     * Execute le sql update
     * @param string $fieldToUpdate Champ
     */
    protected function update(string $fieldToUpdate)
    {
        if ($this->modified == true) {

            $fieldToUpdate .= ' = ' . (gettype($this->values[$fieldToUpdate]) == 'string' ? "'{$this->values[$fieldToUpdate]}'" : "{$this->values[$fieldToUpdate]}");

            $sth = DB::$C->prepare("UPDATE $this->tableName SET $fieldToUpdate WHERE id = {$this->values['id']}");
            $sth->execute();
        }
    }

    /**
     * Supprime l'entité
     * @return int le nbre de lignes traitées ou false
     */
    public function delete()
    {
        $sth = DB::$C->prepare("DELETE FROM $this->tableName WHERE id = {$this->values['id']}");
        return $sth->execute() ? $sth->rowCount() : false;
    }
}