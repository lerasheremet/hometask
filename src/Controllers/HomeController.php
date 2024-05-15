<?php

namespace Lera\Newgit\Controllers;

use Lera\Newgit\Database;
use Lera\Newgit\Viewer;
use PDO;

class HomeController
{
    public function index(): void
    {
        $page = 'home';
        $title = 'Home Page';
        $content = 'Hello, it`s home page!';

        $query = "SELECT * FROM ".Database::$table." ORDER BY rating";
        $stmt = Database::executeQuery($query);

        $data = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }


        $view = new Viewer([
            'page' => $page,
            'title' => $title,
            'content' => $content,
            'data' => $data
        ]);

        $view->render();
    }

        public function handleForm(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /');
            return;
        }

        $genre = $this->filterPost('genre');
        $name = $this->filterPost('name');
        $rating = $this->filterPost('rating');

        if ($genre === null || $name === null || $rating === null) {
            header('Location: /');
            return;
        }

        $query = "INSERT INTO ".Database::$table." (genre, name, rating) VALUES (:genre, :name, :rating)";
        Database::executeQuery($query, ['name' => $name, 'rating' => $rating, 'genre' => $genre]);

        header('Location: /');
    }

        public function handleFormDelete(): void
    {
        $id = $_GET['id'] ?? null;

        $query = "DELETE FROM ".Database::$table." WHERE id = :id";
        Database::executeQuery($query, ['id' => $id]);

        header('Location: /');
    }

        private function filterPost(string $key): ?string
    {
        return isset($_POST[$key]) && is_string($_POST[$key]) ? htmlspecialchars($_POST[$key]) : null;
    }
}