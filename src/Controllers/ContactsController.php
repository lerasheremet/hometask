<?php

namespace Lera\Newgit\Controllers;

use Lera\Newgit\Viewer;

class ContactsController
{
    public function index(): void
    {
        $page = 'contacts';
        $title = 'Contacts Page';
        $content = 'Hello! Its Contacts page';
        $info = 'l.ngfkjdfgjkfdjkfzgbkj.zfdgbj.fzdgb.kjzg';

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
