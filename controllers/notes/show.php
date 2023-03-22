<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrFail();

$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);

view('/notes/show.view.php', [
    'heading' => 'Show Note',
    'note' => $note,
]);
