<?php

use PHPFramework\View;

function app()
{
    return \PHPFramework\Application::$app;
}

function request()
{
    return app()->request;
}

function response()
{
    return app()->response;
}

function view($view = '', $data = [], $layout = ''): View|string
{
    if ($view) {
        return app()->view->render($view, $data, $layout);
    }

    return app()->view;
}

function abort($error = '', $code = 404)
{
    response()->setResponseCode($code);
    echo view("errors/{$code}", ['error' => $error], false);
    die;
}