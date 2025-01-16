<?php

$app->router->get('/', function () {
    return 'home page';
});

$app->router->get('/about', function () {
    return 'about page';
});

$app->router->get('/contact', function () {
    return 'contact page';
});

$app->router->post('/contact', [\App\Controllers\ContactController::class, 'index']);

$app->router->get('/post/(?P<id>[0-9]+)', function ($id) {
    return "post page - $id";
});