<?php

use App\Route;
use App\View;

$router = new Route($_SERVER);

$router->get('/', function () {
    $contacts = [];
    if (isset($_SESSION['contacts'])) {
        $contacts = $_SESSION['contacts'];
    } else {
        $contacts = [
            ['name' => 'John Doe', 'email' => 'johndoe@gmail.com'],
            ['name' => 'Gio Gonzales', 'email' => 'gio.gonzales@gmail.com']
        ];
        $_SESSION['contacts'] = $contacts;
    }

    echo View::make('index', ['contacts' => $contacts]);
});

$router->get('/count', function () {
    echo 'Deez nuts';
});
$router->post('/count', function () {
    echo View::make('count', ['count' => 100]);
});

//newbie checking super globals post
$router->post('/contacts', function () {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contacts = $_SESSION['contacts'];
    $contacts[] = ['name' => $name, 'email' => $email];
    $_SESSION['contacts'] = $contacts;

    echo View::make('contacts', ['contacts' => $contacts]);
});

$router->execute();
