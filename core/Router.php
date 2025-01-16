<?php

namespace PHPFramework;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    protected array $routeParams = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function add($path, $callback, $method): self
    {
        $path = trim($path, '/');

        if (is_array($method)) {
            $method = array_map('strtoupper', $method);
        } else {
            $method = [strtoupper($method)];
        }

        $this->routes[] = [
            'path' => "/$path",
            'callback' => $callback,
            'middleware' => null,
            'method' => $method,
            'needToken' => true,
        ];

        return $this;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function get($path, $callback): self
    {
        return $this->add($path, $callback, 'GET');
    }

    public function post($path, $callback): self
    {
        return $this->add($path, $callback, 'POST');
    }

    public function dispatch(): mixed
    {
        $path = $this->request->getPath();
        $route = $this->matchRoute($path);

        if (false === $route) {
            abort();
        }

        if (is_array($route['callback'])) {
            $route['callback'][0] = new $route['callback'][0];
        }

        return call_user_func_array($route['callback'], $this->routeParams);
    }

    protected function matchRoute($path): mixed
    {
        foreach ($this->routes as $route) {
            if (
                preg_match("#^{$route['path']}$#", "/$path", $matches) &&
                in_array($this->request->getMethod(), $route['method'])
            ) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $this->routeParams[$k] = $v;
                    }
                }

                return $route;
            }
        }

        return false;
    }
}
