<?php

function app() {
    return \PHPFramework\Application::$app;
}

function request() {
    return app()->request;
}

function response() {
    return app()->response;
}