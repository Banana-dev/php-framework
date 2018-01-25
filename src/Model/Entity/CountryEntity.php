<?php

namespace App\Model\Entity;

use Banana\Entity\BaseEntity;

class CountryEntity extends BaseEntity
{
    protected $fieldNames = [
        'id' => ['type' => 'integer'],
        'name' => ['type' => 'string']
    ];
}