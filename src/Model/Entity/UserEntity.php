<?php

namespace App\Model\Entity;

use Banana\Entity\BaseEntity;

class UserEntity extends BaseEntity
{
    public $fieldNames = [
        'id' => ['type' => 'integer'],
        'pseudo' => ['type' => 'string'],
        'email' => ['type' => 'string'],
        'password' => ['type' => 'string'],
        'neighborhood' => ['type' => 'string'],
        'city' => ['type' => 'string'],
        'state' => ['type' => 'string'],
        'bio' => ['type' => 'string'],
        'college' => ['type' => 'string'],
        'twitter_username' => ['type' => 'string'],
        'created' => ['type' => 'string'],
        'modified' => ['type' => 'string'],
        'country_id' => ['type' => 'integer']
    ];
}