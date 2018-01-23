<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 22/01/2018
 * Time: 16:56
 */

namespace App\Table;

use Banana\Table\BaseTable;

class CountriesTable extends BaseTable
{
    function __construct()
    {
        $this->tableName = 'countries';
    }
}