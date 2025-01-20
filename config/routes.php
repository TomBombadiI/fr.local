<?php

$app->router->get('/', function () {
    return 'home page';
});

$app->router->get('/about', function () {
    return 'about page';
});

$app->router->get('/contact', [\App\Controllers\ContactController::class, 'index']);
$app->router->post('/contact', [\App\Controllers\ContactController::class, 'send']);

$app->router->get('/login', [\App\Controllers\UserController::class, 'login']);
$app->router->get('/register', [\App\Controllers\UserController::class, 'register']);
$app->router->post('/login', [\App\Controllers\UserController::class, 'login']);
$app->router->post('/register', [\App\Controllers\UserController::class, 'store']);