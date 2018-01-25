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
}