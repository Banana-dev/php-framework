<?php

namespace Banana\Utility;

class Flash
{
    public static function add($data, $type)
    {
        $_SESSION['_flash'][] = ['value' => $data, 'type' => $type];
    }

    public static function get()
    {
        $flash = Session::get('_flash');
        Session::remove('_flash');
        return $flash;
    }

    public static function hasFlash()
    {
        return count(Session::get('_flash')) > 0;
    }
}