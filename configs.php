<?php

define('CONFIGS', [
    "viewPathDir" => __DIR__ . DIRECTORY_SEPARATOR . "views",
    "uploadPathDir" => __DIR__ . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "upload",
    "dataPathFile" => __DIR__ . DIRECTORY_SEPARATOR . "posts-data.php",
    "DB" => [
        "mysql" => [
            "className" => "\Core\Mysql",
            "host" => "localhost",
            "name" => "nix_edu",
            "user" => "root",
            "password" => "",
            "charset" => "utf8"
        ]
    ],
    "defaultDBConnection" => "mysql"
]);
