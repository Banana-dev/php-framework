<?php

namespace App\Controller;

use App\Model\Table\CountriesTable;
use App\Model\Entity\countryEntity;
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
//        $countries = new CountriesTable();
//        $countries->getAll();
//        echo '<pre>';
//        var_export($countries, false);
//        echo '</pre>';
//
//        // Entités
//        echo $countries->entities[0]->id; // __get
//        $countries->entities[0]->name = 'Allemagne'; // __set
//
//        echo '<pre>';
//        var_export($countries, false);
//        echo '</pre>';
//
//        // DELETE
//        var_dump($countries->entities[0]->delete());

        $users = new UsersTable();
        $users->getAll();
        $this->pre($users);
        echo $users->entities[0]->delete();

//        $sql = "SELECT * FROM users";
//        $this->pre($this->q($sql));


//        $sql ="insert into users (pseudo, email, password, created, country_id)
//                          VALUES (:pseudo, :email, :password, :created, :country_id)";
//        $arg = [
//            'pseudo' => 'Jean',
//            'email' => 'jean@outlook.com',
//            'password' => 'password',
//            'created' => date('Y-m-d H:i:s'),
//            'country_id' => 4
//            ];
//        echo '<pre>';
//        var_dump($this->q($sql, $arg));
//        echo '</pre>';
    }
}