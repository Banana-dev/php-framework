<?php

namespace App\Controller;

use App\Model\Table\CountriesTable;
use App\Model\Table\UsersTable;
use Banana\Controller\BaseController;
use Banana\Entity\BaseEntity;

/**
 * Class DbTestController
 * Controleur pour les test de base de données
 * @package App\Controller
 */
class DbTestController extends BaseController
{
    /**
     * Page d'index
     */
    public function index()
    {
        $Users = new UsersTable();
        $Users->getByEmail("test@mail.com");
        var_dump($Users->data);

        $Users->getByEmailOrderBy('test@mail.com', 'email', 'ASC');
        var_dump($Users->data);

        $Countries = new CountriesTable();
        $Countries->getByName('France');
        var_dump($Countries->data);

        $collectionsEntity = new BaseEntity('collections');
        echo '<pre>';
        var_dump($collectionsEntity->get());
        echo '</pre>';
    }
}