<?php

namespace App\Controller;

use Banana\Controller\BaseController;
use template\template;
use Article;
class PagesController extends BaseController
{
    public function index()
    {
        
		 
		// $object = new stdClass();
		// $object->attr = 'Je suis un attribut';
		 
		$article = new Article();
		 
		$arr = [
			'pays' => 'france',
			'langue' => 'français',
			'departements' => [
				'59' => 'Nord',
				'60' => 'Oise'
			]
		];
		 
		$tpl = new Tpl('index.tpl');
		$tpl->set('sitename', 'Mon super site');
		$tpl->set('obj', $object);
		$tpl->set('tableau', $arr);
		$tpl->set('ARTICLE', $article);
		echo $tpl->output();
    }
}
