<?php

namespace App\Controller;

use App\Model\Table\ArticleTable;
use Banana\Controller\BaseController;
use Banana\Template\Template;

/**
 * Class TemplateTestController
 * @package App\Controller
 */
class TemplateTestController extends BaseController
{

    /**
     * Page d'index
     * @throws \Banana\Template\Exception
     */
    public function index()
    {

        $article = new ArticleTable();

        $arr = [
            'pays' => 'france',
            'langue' => 'français',
            'departements' => [
                '59' => 'Nord',
                '60' => 'Oise'
            ]
        ];

        $tpl = new Template('src/Views/TemplatePage/index.php');
        $tpl->set('sitename', 'Mon super site');
        $tpl->set('tableau', $arr);
        $tpl->set('ARTICLE', $article);
        return $tpl->output();
    }
}
