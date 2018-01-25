<?php

namespace App\Controller;

use Banana\Controller\BaseController;
use Banana\Template\Template;

class PagesController extends BaseController
{

    public function index()
    {
        $arr = [
            'pays' => 'france',
            'langue' => 'français',
            'departements' => [
                '59' => 'Nord',
                '60' => 'Oise'
            ]
        ];
        $tpl = new Template('src/views/index.php');
        $tpl->set('sitename', 'Mon super site');
        $tpl->set('tableau', $arr);
        echo $tpl->output();
    }
}
