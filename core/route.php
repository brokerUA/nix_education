<?php

$rawUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$url = explode('/', $rawUrl);

$controllerName = isset($url[1]) ? htmlentities($url[1]) : null;

$actionName = isset($url[2]) ? htmlentities($url[2]) : null;

if ($controllerName) {
    $filePath = $_CONFIGS['baseDir'] . 'app' . DIRECTORY_SEPARATOR . $controllerName . 'Controller.php';

    if (file_exists($filePath)) {
        $name = "\\App\\{$controllerName}Controller";

        $controller = new $name();

        if (method_exists($controller, $actionName)) {
            return $controller->$actionName();
        }

        return $controller->index();

    }

}
