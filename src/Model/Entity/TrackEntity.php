<?php

namespace App\Model\Entity;

use Banana\Entity\BaseEntity;

class TrackEntity extends BaseEntity
{
    public $fieldNames = [
        'id' => ['type' => 'int'],
        'created' => ['type' => 'datetime'],
        'modified' => ['type' => 'datetime'],
        'name' => ['type' => 'varchar'],
        'youtube_link' => ['type' => 'varchar'],
        'album' => ['type' => 'varchar'],
        'year' => ['type' => 'int'],
        'user_id' => ['type' => 'int'],
        'artist_id' => ['type' => 'int'],
    ];
}