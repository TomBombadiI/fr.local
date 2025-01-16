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

$app->router->post('/contact', function () {
    return 'contact POST page';
});
