<?php

namespace App\Model\Table;

use Banana\Model\BaseTable;

class UsersTable extends BaseTable
{
    function __construct()
    {
        $this->tableName = 'users';
        $this->entityName = 'user';
    }
}