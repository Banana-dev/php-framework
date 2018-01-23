<?php
namespace Banana\Utility;

use PDO;
use PDOException;

class DB
{
    /**
     * @var bool Définit si le singleton a été instancié
     */
    protected static $instanciated = false;
    /**
     * @var PDO Objet de la connexion, à utiliser pour les requêtes
     */
    public static $C;

    /**
     * Instancie la classe et se connecte à la base.
     *
     * @return bool True en cas de réussie
     *
     * @throws \Exception
     */
    public static function initialize()
    {
        if (!self::$instanciated) {
            $conf = Config::get('db');

            try {
                self::$C = new PDO("mysql:host={$conf['host']};dbname={$conf['db']};charset=utf8",
                    "{$conf['username']}",
                    "{$conf['password']}");
                self::$instanciated = true;
            } catch (PDOException $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        return self::$instanciated;
    }

    /**
     * Constructeur privé pour que personne ne puisse instancier.
     */
    private function __construct()
    {
    }
}