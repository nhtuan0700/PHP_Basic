<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 50)) {
    $errors['body'] = 'A body of no more than 10 characters is required.';
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'user_id' => 1,
    'body' => $_POST['body']
]);

header('location: /notes');
die();
