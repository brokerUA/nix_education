<?php

namespace App;

use Core\View;

class PostsController extends ControllerBase
{
    public function index(): void
    {

        /*
         * Add new post
         *
        $post = new Post();
        $post->title = "test";
        $post->text = "text";
        $post->save();
        var_dump($post->id);
        */

        /*
         * Update last post
         *
        $post = new Post();
        $post->find(1);
        $post->published = 1;
        $post->title = "Update title Y";
        $post->save();
        */

        /*
         * Get the post
         *
        $post = new Post();
        $post->find(1);
        var_dump($post->toArray());
        */

        /*
         * Delete the post
         *
        $post = new Post();
        $post->find(1);
        $post->delete();
        */

        // All published posts
        $post = new Post();
        $posts = $post->getPublished();

        $view = new View('posts', compact('posts'));
        $view->execute();
    }
}
