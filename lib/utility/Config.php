<?php

namespace Banana\Utility;

/**
 * Class Config
 * @package Banana\Utility
 */
final class Config
{
    protected static $instanciated = false;
    protected static $config = [];

    /**
     * Vérifie si la config a été chargée et la charge si nécessaire
     * @throws \Exception
     */
    private static function instance()
    {
        if (!self::$instanciated) {
            $file = __DIR__ . '/../../config.php';
            if (!file_exists($file)) {
                throw new \Exception('Fichier config.php manquant.');
            } else {
                self::$config = require $file;
            }
        }
    }

    /**
     * Renvoie une valeur de config
     * @param $path Chemin vers la valeur. Le séparateur de clé est un point '.'
     * @return mixed|null
     * @throws \Exception
     */
    public static function get($path = null)
    {
        self::instance();
        if($path === null){
            return self::$config;
        }
        return Hash::get(self::$config, $path);
    }

    /**
     * Renvoie une valeur de config
     * @param $path Chemin vers la valeur. Le séparateur de clé est un point '.'
     * @param $value Nouvelle valeur
     * @throws \Exception
     */
    public static function set($path, $value)
    {
        self::instance();
        self::$config = Hash::set(self::$config, $path, $value);
    }

    /**
     * Constructeur privé pour que personne ne puisse instancier.
     */
    private function __construct()
    {

    }
}