<?php

namespace App\Controller;

use Banana\Controller\BaseController;
use Banana\Template\Template;

/**
 * Class PagesController
 *
 * @package App\Controller
 */
class PagesController extends BaseController
{
    /**
     * Page d'index
     */
    public function index()
    {
        $tpl = new Template('src/Views/docTemplaqsdqsdqsdte.php');
    }

    public function docTemplate(){
    	$tpl = new Template('src/Views/docTemplate.php');
    	return $tpl->output();
    }
}
