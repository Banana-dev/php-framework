<?php

namespace App\Controller;

use App\Table\CountriesTable;
use App\Table\UsersTable;

use Banana\Controller\BaseController;
use Banana\Entity\BaseEntity;

class DbTestController extends BaseController
{
    public function getUsersByEmail()
    {
        $Users = new UsersTable();
        $Users->getByEmail("test@mail.com");

    }

    public function getUsersByEmailOrderBy()
    {
        $Users = new UsersTable();
        $Users->getByEmailOrderBy('test@mail.com', 'email', 'ASC');
        var_dump($Users->data);
    }

    public function getCountriesByName()
    {
        $Countries = new CountriesTable();
        $Countries->getByName('France');
        var_dump($Countries->data);
    }

    public function getFieldNames () {
        $collectionsEntity = new BaseEntity('collections');
        echo '<pre>';
        var_dump($collectionsEntity->get());
        echo '</pre>';
    }
}