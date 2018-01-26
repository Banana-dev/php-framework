<?php

namespace App\Controller;

use App\Model\Table\CountriesTable;
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

        $sql = "SELECT * FROM users";
        echo '<pre>';
        var_dump($this->q($sql));
        echo '</pre>';

        $sql ="INSERT INTO users (pseudo, email, password, created, country_id) 
                          VALUES (:pseudo, :email, :password, :created, :country_id)";
        $arg = [
            'pseudo' => 'Jean',
            'email' => 'jean@outlook.com',
            'password' => 'password',
            'created' => date('Y-m-d H:i:s'),
            'country_id' => 4
            ];
        echo '<pre>';
        var_dump($this->q($sql, $arg));
        echo '</pre>';
    }
}