<?php

namespace App\Controller;

use Banana\Controller\BaseController;
use Template\template\Tpl;
use Models\Article\Article;

class PagesController extends BaseController
{
    public function index()
    {
		 
		$article = new Article();
		 
		$arr = [
			'pays' => 'france',
			'langue' => 'français',
			'departements' => [
				'59' => 'Nord',
				'60' => 'Oise'
			]
		];
		 
		$tpl = new Tpl('src/views/index.html');
		$tpl->set('sitename', 'Mon super site');
		$tpl->set('tableau', $arr);
		$tpl->set('ARTICLE', $article);
		echo $tpl->output();
    }
}
