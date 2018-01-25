<?php

namespace App\Controller;

use App\Model\Table\CountriesTable;
use App\Model\Table\UsersTable;
use Banana\Controller\BaseController;

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
        $users = new UsersTable();
        $users->getAll();
        echo '<pre>';
        var_export($users, false);
        echo '</pre>';
        echo '<br/>';
        $countries = new CountriesTable();
        $countries->getAll();
        echo '<pre>';
        var_export($countries, false);
        echo '</pre>';
    }
}