<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 22/01/2018
 * Time: 16:56
 */

namespace App\Model\Table;

use Banana\Model\BaseTable;

class CountriesTable extends BaseTable
{
    function __construct()
    {
        $this->tableName = 'countries';
    }
}