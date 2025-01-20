<?php

namespace PHPFramework;

class Request
{

    protected string $uri;

    public function __construct(string $uri)
    {
        $this->uri = trim(urldecode($uri), '/');
    }

    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): bool
    {
        return $this->getMethod() === 'GET';
    }

    public function isPost(): bool
    {
        return $this->getMethod() === 'POST';
    }

    public function isAjax(): bool
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    public function get($key, $default = null): ?string
    {
        return $_GET[$key] ?? $default;
    }

    public function post($key, $default = null): ?string
    {
        return $_POST[$key] ?? $default;
    }

    public function getAll(): array
    {
        return $_GET;
    }

    public function postAll(): array
    {
        return $_POST;
    }

    public function getData(): array
    {
        $data = [];

        $requestData = $this->isGet() ? $_GET : $_POST;
        foreach ($requestData as $key => $value) {
            $data[$key] = trim($value);
        }

        return $data;
    }

    public function getContentType(): string
    {
        return $_SERVER['CONTENT_TYPE'] ?? '';
    }

    public function getPath(): string
    {
        return $this->getUriWithoutQuery();
    }

    protected function getUriWithoutQuery(): string
    {
        if ($this->uri) {
            $params = explode('?', $this->uri);
            return trim($params[0], '/');
        }

        return '';
    }
}
