<?php

use Learning\Controllers\UsersController;
use Learning\Core\Res;
use Learning\Core\Routes\Router;

$app = new Router();

$app->get('/', function() {
    return Res::send('Hello World');
});

$app->get('/params/{name}', function($name) {
    return Res::send('Hello World ' . $name);
});

$app->get('/users', UsersController::class, 'getAll');
$app->put('/users/{id}', UsersController::class, 'update');