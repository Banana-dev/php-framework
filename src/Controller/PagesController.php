<?php

namespace App\Controller;

use Banana\Controller\BaseController;
use Banana\Template\Template;

class PagesController extends BaseController
{

    public function index()
    {
        $view = new template('Pages/index');
        echo $view->render(['title' => 'Page title'], 'Pages/index');
    }
}
