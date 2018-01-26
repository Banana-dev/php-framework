<?php

namespace App\Model\Entity;

use Banana\Entity\BaseEntity;

class ArtistEntity extends BaseEntity
{
    public $fieldNames = [
        'id' => ['type' => 'integer'],
        'primary' => ['type' => 'bool'],
        'created' => ['type' => 'datetime'],
        'modified' => ['type' => 'datetime'],
        'name' => ['type' => 'string'],
    ];
}