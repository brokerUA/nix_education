<?php

$request = htmlentities($_SERVER['REQUEST_URI']);

$route = new Core\Route($request);

$route->addRule('/', 'IndexController@index');

$route->addRule('/posts', 'PostsController@index');

$route->addRule('/profile', 'ProfileController@index');

$route->addRule('/profile', 'ProfileController@save', 'POST');

$route->addRule('/profile/edit', 'ProfileController@edit');

$route->addRule('/login', 'AuthController@show');

$route->addRule('/login', 'AuthController@save', 'POST');

$route->addRule('/logout', 'AuthController@logout');

$route->addRule('/registration', 'RegistrationController@show');

$route->addRule('/registration', 'RegistrationController@save', 'POST');

$route->execute();
