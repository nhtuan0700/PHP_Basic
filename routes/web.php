<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');

$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note/edit', 'controllers/notes/update.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes/create', 'controllers/notes/store.php');

$router->get('/registration', 'controllers/registration/create.php');
$router->post('/registration', 'controllers/registration/store.php');