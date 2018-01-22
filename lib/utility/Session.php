<?php 
public class Session
{
    protected static $instanciated = false;
	
	private static function instance()
    {
        if (!self::$instanciated) {
            $file = __DIR__ . '/../../Session.php';
            if (!file_exists($file)) {
                throw new \Exception('Fichier Session.php manquant.');
            } else {
                self::$_SESSION[USER] = require $file;
            }
        }
    }
	
    public static function get($path = null)
    {
        self::instance();
        if($path === null){
            return self::$_SESSION[USER];
        }
        return Hash::get(self::$_SESSION[USER], $path);
    }

    public static function set($path, $value)
    {
        self::instance();
        self::$_SESSION[USER] = Hash::set(self::$_SESSION[USER], $path, $value);
    }
}
?>