<?php

namespace Banana\Utility;

class Auth
{
    public static function isAuth()
    {
        return Session::get('_auth.isAuth') === true;
    }

    public static function auth($user)
    {
        Session::set('_auth', ['isAuth' => true, 'user' => $user]);
    }

    public static function logout()
    {
        Session::remove('_auth');
    }
}