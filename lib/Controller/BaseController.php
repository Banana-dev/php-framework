<?php

namespace Banana\Controller;

use Banana\Utility\DB;
/**
 * Class BaseController
 * Controleur de base
 *
 * @package Banana\Controller
 */
class BaseController
{


    public function pre($s)
    {
        echo '<pre>';
        var_dump($s);
        echo '</pre>';
    }
}