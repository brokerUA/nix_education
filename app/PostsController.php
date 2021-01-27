<?php

namespace App;

use Core\View;

class PostsController extends ControllerBase
{
    public function index(): void
    {
        $post = new Post();
        $posts = $post->getPublished();

        $view = new View('posts', compact('posts'));
        $view->execute();
    }
}
