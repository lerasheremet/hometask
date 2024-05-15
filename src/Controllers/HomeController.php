<?php

namespace Lera\Newgit\Controllers;

use Lera\Newgit\Viewer;

class HomeController
{
    public function index(): void
    {
        $page = 'home';
        $title = 'Home Page';
        $content = 'Hello, it`s home page!';
        $data = [];

        $view = new Viewer([
            'page' => $page,
            'title' => $title,
            'content' => $content,
            'data' => $data
        ]);

        $view->render();
    }
}