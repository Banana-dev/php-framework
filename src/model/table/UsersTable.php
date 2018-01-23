<?php

namespace App\Model\Table;

// je travail dans ce dossier
use Banana\Model\BaseTable;

class UsersTable extends BaseTable
{
    // Nom de la table
    function __construct()
    {
        $this->tableName = 'users';
    }
}