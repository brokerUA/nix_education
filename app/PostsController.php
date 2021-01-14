<?php

namespace App;

use Core\View;

class PostsController
{
    public function index(array $request = []): string
    {
        $post = new Post();

        $view = new View('posts', [
            'posts' => $post->getAll()
        ]);

        return $view->execute();
    }
}
