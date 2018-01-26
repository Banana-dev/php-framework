<?php

namespace App\Controller;

use Banana\Controller\BaseController;
use Banana\Template\Template;

class PagesController extends BaseController
{

    public function index()
    {
        echo $this->_render('Pages/index', ['title' => 'Page title']);
    }
}
