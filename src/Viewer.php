<?php

namespace Lera\Newgit;

use Latte;

class Viewer
{
    private array $data = [];

    public function __construct(array $data = []){
        $this->data = $data;
    }

    public function render(): void
    {
        $latte = new Latte\Engine;
        $latte->setTempDirectory(__DIR__ . '/../views/cache');

        $isUserLoggedIn = !empty($_SESSION['login']) && $_SESSION['login'] === 'Test';

        $params = $this->data;
        $params['isUserLoggedIn'] = $isUserLoggedIn;

        $latte->render(__DIR__ . '/../views/index.latte', $params);
    }
}
