<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    public $routes = [];

    protected function add($method, $uri, $controller)
    {
        // $this->routes[] = compact('method', 'uri', 'controller');
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller,
            'middleware' => null,
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                (new Middleware)->resolve($route['middleware']);
                return require base_path($route['controller']);
            }
        }
        abort(404);
    }
}
