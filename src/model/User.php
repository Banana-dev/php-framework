<?php
/**
 * Created by PhpStorm.
 * User: lucpi
 * Date: 23/01/2018
 * Time: 15:01
 */

use Banana\Entity\BaseEntity;

class User extends BaseEntity
{
    public function __construct($tablename, $row)
    {
        parent::__construct($tablename, $row);
    }
}