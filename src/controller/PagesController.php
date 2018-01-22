<?php

namespace App\Controller;

use Banana\Controller\BaseController;

use App\Table\UsersTable;

class PagesController extends BaseController
{
    public function index()
    {
        $Users = new UsersTable();
        print_r($Users->getByEmail());
    }
}