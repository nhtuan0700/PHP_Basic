<?php

namespace Core\Middleware;

class Authenticate
{
    public function handle()
    {
        if (!$_SESSION['user']) {
            header('location: /');
            exit();
        }
    }
}
