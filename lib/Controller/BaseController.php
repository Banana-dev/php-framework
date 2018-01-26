<?php

namespace Banana\Controller;

use Banana\Template\Template;

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

    protected function _render($view, $vars = [], $template = null)
    {
        $view = new Template($view);
        $view->setVars($vars);
        if (!is_null($template)) {
            $view->setLayout($template);
        }
        return $view->render();
    }
}