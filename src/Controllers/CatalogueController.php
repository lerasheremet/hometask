<?php

namespace Lera\Newgit\Controllers;

use Lera\Newgit\Viewer;

class CatalogueController
{
    public function index(): void
    {
        $page = 'catalogue';
        $title = 'Catalogue';
        $content = 'Hello! Its catalogue page';
        $info = 'huyd5678';

        $view = new Viewer(
            [
                'page' => $page,
                'title' => $title,
                'content' => $content,
                'info' => $info
            ]
        );

        $view->render();
    }
}