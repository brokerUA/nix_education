<?php

$request = htmlentities($_SERVER['REQUEST_URI']);

$route = new Core\Route($request);

$route->addRule('/', 'IndexController@index');

$route->addRule('/posts', 'PostsController@index');

$route->addRule('/profile', 'ProfileController@index');

$route->addRule('/login', 'AuthController@login');

$route->addRule('/registration', 'AuthController@signup');

$route->addRule('/logout', 'AuthController@logout');

$route->execute();
