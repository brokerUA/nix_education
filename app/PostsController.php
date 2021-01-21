<?php

namespace App;

use Core\View;

class PostsController extends ControllerBase
{
    public function index(): void
    {

        $post = new Post();

        $view = new View();

        $view->path = 'posts';

        $view->data = [
            'posts' => $post->getAll()
        ];

        $view->execute();
    }
}
