<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 22/01/2018
 * Time: 11:49
 */

namespace App\Table;

// je travail dans ce dossier
use Banana\Table\BaseTable;

class UsersTable extends BaseTable
{
    // Nom de la table
    function __construct()
    {
        $this->tableName = 'users';
    }
}