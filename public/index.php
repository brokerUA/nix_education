<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$_CONFIGS = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'core.php';

$result = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'route.php';

echo $result;
