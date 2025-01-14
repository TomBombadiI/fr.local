<?php

namespace PHPFramework;

class Request
{

    public string $uri;

    public function __construct(string $uri)
    {
        $this->uri = trim(urldecode($uri), '/');
    }

}