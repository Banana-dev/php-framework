<?php

namespace App\Controller;

use Banana\Controller\BaseController;
use Banana\Utility\Auth;
use Banana\Utility\DB;
use Banana\Utility\Flash;
use Banana\Utility\Hash;
use Banana\Utility\Router;

class UsersController extends BaseController
{
    public function index()
    {
        echo $this->_render('Users/index', ['title' => 'Membres']);
    }

    public function login()
    {
        if (count($_POST) > 0) {
            // Check for user
            $email = Hash::get($_POST, 'email');
            $password = Hash::get($_POST, 'password');

            $sql = 'SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1';
            $stmt = DB::$C->prepare($sql);

            $stmt->execute(['email' => $email, 'password' => md5($password)]);
            if ($stmt->rowCount() === 1) {
                Auth::auth($stmt->fetch());
                Flash::add('Bienvenue', 'success');
                Router::redirect('pages', 'index');
            } else {
                Flash::add('Raté', 'warning');
            }
        }
        echo $this->_render('Users/login', ['title' => 'Connexion']);
    }

    public function logout()
    {
        Auth::logout();
        Flash::add('Au revoir', 'success');
        Router::redirect('users', 'login');
    }

    public function register()
    {
        echo $this->_render('Users/register', ['title' => 'Créer un compte']);
    }
}