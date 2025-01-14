<?php

use PHPFramework\Application;

$startAppTime = microtime(true);

if (PHP_MAJOR_VERSION < 8) {
    die('PHP 8 or higher is required');
}

require_once __DIR__ . '/../config/init.php';
require_once ROOT . '/vendor/autoload.php';

$app = new Application();

dump("Time: " . microtime(true) - $startAppTime);