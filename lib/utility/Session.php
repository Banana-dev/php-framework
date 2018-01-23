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
            return self::$_SESSION[];
        }
        return Hash::get(self::$_SESSION[], $path);
    }

    public static function set($path, $value)
    {
        self::instance();
        self::$_SESSION[] = Hash::set(self::$_SESSION[], $path, $value);
    }
}
?>