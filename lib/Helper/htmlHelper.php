<?php

namespace Banana\Helper;

class htmlHelper
{

    public static function loadCss($file)
    {
        return '<link rel="stylesheet" href="/assets/css/' . $file . '">';
    }

    public static function loadJs($file)
    {
        return '<script src="/assets/js/' . $file . '"></script>';
    }

    public static function link($title, $controller, $action, $params = [])
    {
        $url = self::url($controller, $action, $params);
        return '<a href="' . $url . '">' . $title . '</a>';
    }

    public static function url($controller, $action, $params)
    {
        $paramString = [];
        foreach ($params as $k => $v) {
            $paramString[] = $k . '=' . $v;
        }

        return 'index.php?controller=' . $controller . '&action=' . $action . join('&', $paramString);
    }
}