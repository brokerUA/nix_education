<?php

$request = htmlentities($_SERVER['REQUEST_URI']);

$route = new Core\Route($request);

$route->addRule('/', 'IndexController@index');

$route->addRule('/posts', 'PostsController@index');

$route->addRule('/profile', 'ProfileController@index');

$route->addRule('/login', 'LoginController@index');

$route->addRule('/registration', 'RegistrationController@index');

$route->execute();
