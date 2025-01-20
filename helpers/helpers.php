<?php

use PHPFramework\Application;
use PHPFramework\View;
use PHPFramework\Request;
use PHPFramework\Response;

function app(): Application
{
    return Application::$app;
}

function request(): Request
{
    return app()->request;
}

function response(): Response
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

function abort($error = '', $code = 404): void
{
    response()->setResponseCode($code);
    echo view("errors/{$code}", ['error' => $error], false);
    die;
}

function getBaseUrl($path): string
{
    return PATH . $path;
}

function asset($path): string
{
    return PATH . '/assets/' . ltrim($path, '/');
}