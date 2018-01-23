<?php 
public class Session
{
    protected static $instanciated = false;
	
	private static function instance()
    {
        if (!self::$instanciated) {
			session_start();
			$instanciated = true;
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