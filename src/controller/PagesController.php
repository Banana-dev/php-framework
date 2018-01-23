<?php

namespace App\Controller;

use App\Table\CountriesTable;
use App\Table\UsersTable;

use Banana\Controller\BaseController;
use Banana\Template\Template;
use App\Models\Article\Article;

class PagesController extends BaseController
{
    public function getUsersByEmail()
    {
        $Users = new UsersTable();
        $Users->getByEmail("test@mail.com");
        var_dump($Users->data);
    }

    public function getUsersByEmailOrderBy()
    {
        $Users = new UsersTable();
        $Users->getByEmailOrderBy('test@mail.com', 'email', 'ASC');
        var_dump($Users->data);
    }

    public function getCountriesByName()
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

		$tpl = new Template('src/views/index.html');
		$tpl->set('sitename', 'Mon super site');
		$tpl->set('tableau', $arr);
		$tpl->set('ARTICLE', $article);
		echo $tpl->output();
    }
}
