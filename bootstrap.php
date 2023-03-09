<?php

use Core\App;
use Core\Database;

$container = new Core\Container();

$container->bind(Database::class, function () {
    $config = config('database');
    return new Database($config);
});

App::setContainer($container);
