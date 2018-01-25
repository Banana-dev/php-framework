<?php

namespace App\Model\Entity;

use Banana\Entity\BaseEntity;

class UserEntity extends BaseEntity
{
    public $fieldNames = [
        'id',
        'name',
        'country_id'
    ];
}