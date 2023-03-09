<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
    const MAP = [
        'auth' => Authenticate::class,
        'guest' => Guest::class,
    ];

    public function resolve($key)
    {
        if (!$key) {
            return;
        }
        
        $middleware = static::MAP[$key];

        if (!$middleware) {
            throw new Exception("No matching middleware found for key {$key}.");
        }

        (new $middleware)->handle();
    }
}
