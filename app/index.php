<?php

require_once __DIR__ . '/vendor/autoload.php';

use Learning\Controllers\UsersController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Learning\Core\Core;

try {
    $request = Request::createFromGlobals();
    $app = new Core();

    $app->map('/', function() {
        return new Response('Hello World');
    });

    $app->map('/params/{name}/{test}', function($name, $test) {
        return new Response('Hello World ' . $name . $test);
    });

    $app->map('/users', UsersController::class, 'getAll');

    $response = $app->handle($request);
    $response->send();
} catch (Exception $e) {
    echo $e->getMessage();
}
