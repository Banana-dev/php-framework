<?php

namespace Banana\Utility;
use Banana\Exception\NotFoundException;

/**
 * Class Config
 * Accès aux variables de configuration
 * @package Banana\Utility
 */
final class Config
{
    /**
     * @var bool Définit si le singleton a été instancié
     */
    protected static $instanciated = false;
    /**
     * @var array Valeurs de configuration
     */
    protected static $config = [];

    /**
     * Vérifie si la config a été chargée et la charge si nécessaire
     * @throws \Exception
     */
    private static function instance()
    {
    	try {
		    if (!self::$instanciated) {
			    $file = __DIR__ . '/../../config.php';
			    if (!file_exists($file)) {
				    throw new NotFoundException('Fichier config.php manquant.');
			    } else {
				    self::$config = require $file;
			    }
		    }
	    } catch (\Exception $exception) {
    		new ExceptionHandler($exception);
	    }
    }

    /**
     * Renvoie une valeur de config
     * @param string $path Chemin vers la valeur. Le séparateur de clé est un point '.'
     * @return mixed|null
     * @throws \Exception
     */
    public static function get($path = null)
    {
        self::instance();
        if ($path === null) {
            return self::$config;
        }
        return Hash::get(self::$config, $path);
    }

    /**
     * Renvoie une valeur de config
     * @param string $path Chemin vers la valeur. Le séparateur de clé est un point '.'
     * @param mixed|null $value Nouvelle valeur
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