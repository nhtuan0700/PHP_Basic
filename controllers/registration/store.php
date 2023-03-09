<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $_POST['email']
])->find();

if ($user) {
    $errors['email'] = 'This email has existed';
}

if (!Validator::email($_POST['email'])) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($_POST['password'], 7, 255)) {
    $errors['password'] = 'Please provide a password of at lease seven characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


$db->query('INSERT INTO users(email, password, name) VALUES(:email, :password, :name)', [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'name' => ''
]);

$_SESSION['user'] = [
    'email' => $_POST['email']
];

header('location: /');
die();
