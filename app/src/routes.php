<?php

use Learning\Controllers\UsersController;
use Learning\Core\Res;
use Learning\Core\Routes\Router;

$router = new Router();

$router->get('/', function() {
    return Res::send('Hello World');
});

$router->get('/params/{name}', function($name) {
    return Res::send('Hello World ' . $name);
});

$router->get('/users', UsersController::class, 'getAll');
$router->put('/users/{id}', UsersController::class, 'update');