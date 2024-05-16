<?php

namespace Lera\Newgit\Controllers;

use Lera\Newgit\Viewer;
use JetBrains\PhpStorm\NoReturn;

class LoginController
{
    public function index(): void
    {
        $page = 'login';
        $title = 'Login Page';

        $view = new Viewer(
            [
                'page' => $page,
                'title' => $title
            ]
        );

        $view->render();
    }

    #[NoReturn] public function auth(): void
    {
        if(!isset($_POST['login'])) {
            header('Location: /login');
            exit;
        }

        $login = $_POST['login'] ?? '';

        if ($login === 'Test') {
            $_SESSION['login'] = $login;
            header('Location: /contacts');
        } else {

            header('Location: /login');
        }
        exit;
    }
}