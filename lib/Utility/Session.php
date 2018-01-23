<?php

namespace Banana\Utility;

class Session
{
    protected static $instanciated = false;

    private static function instance()
    {
        if (!self::$instanciated) {
            session_start();
            self::$instanciated = true;
        }
    }

    public static function get($path = null)
    {
        self::instance();
        if ($path === null) {
            return $_SESSION;
        }
        return Hash::get($_SESSION, $path);
    }

    public static function set($path, $value)
    {
        self::instance();
        $_SESSION = Hash::set($_SESSION, $path, $value);
    }
}

?>