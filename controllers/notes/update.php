<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);
$note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOrFail();

$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);
$errors = [];

if (!Validator::string($_POST['body'], 1, 50)) {
    $errors['body'] = 'A body of no more than 10 characters is required.';
}

if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);

header('location: /notes');
die();
