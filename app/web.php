<?php

use App\Route;
use App\View;
use App\Helpers;

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

    $errors = [];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contacts = $_SESSION['contacts'];

    //validation (How can I add http status code to this?) http headers?

    if (Helpers::emailExists($contacts, $email)) {
        $errors['email'] = 'Email already exists';
        http_response_code(422);
        echo View::make('create-form', ['contacts' => $contacts, 'errors' => $errors, 'formData' => ['name' => $name, 'email' => $email]]);
        return;
    }

    $contacts[] = ['name' => $name, 'email' => $email];
    $_SESSION['contacts'] = $contacts;

    echo View::make('contacts', ['contacts' => $contacts]);
});

$router->execute();
