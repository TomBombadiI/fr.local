<?php

use PHPFramework\Application;
use PHPFramework\View;

$startAppTime = microtime(true);

if (PHP_MAJOR_VERSION < 8) {
    die('PHP 8 or higher is required');
}

require_once __DIR__ . '/../config/config.php';
require_once ROOT . '/vendor/autoload.php';
require_once HELPERS . '/helpers.php';

$request = new \PHPFramework\Request($_SERVER['REQUEST_URI']);
$response = new \PHPFramework\Response();
$router = new \PHPFramework\Router($request, $response);
$view = new View(LAYOUT);

$app = new Application(
    $request,
    $response,
    $router,
    $view
);

require_once CONFIG . '/routes.php';

$app->run();

dump("Time: " . microtime(true) - $startAppTime);
