<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $path, array $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, array $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(string $method, string $path): mixed
    {
        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];
            $controller = new $handler[0]();
            $action = $handler[1];
            return $controller->$action();
        }

        Response::notFound();
        return null;
    }
} 