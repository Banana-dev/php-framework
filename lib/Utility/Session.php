<?php

namespace Banana\Utility;

class Session
{
    protected static $instanciated = false;

    public static function initialize()
    {
        if (!self::$instanciated) {
            session_start();
            self::$instanciated = true;
        }
    }

    public static function get($path = null)
    {
        if ($path === null) {
            return $_SESSION;
        }
        return Hash::get($_SESSION, $path);
    }

    public static function set($path, $value)
    {
        $_SESSION = Hash::set($_SESSION, $path, $value);
    }

    public static function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}

?>