<?php

namespace Lera\Newgit;

class AuthMiddleware
{
    public function handle($handler, $vars)
    {
        if (!empty($_SESSION['login']) && $_SESSION['login'] === 'Test') {
            return call_user_func($handler, $vars);
        } else {
            header('Location: /login');
            exit;
        }
    }
}