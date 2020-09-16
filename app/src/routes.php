<?php

use Learning\Controllers\UsersController;
use Learning\Core\Res;
use Learning\Core\Routes\Router;

$app = new Router();

$app->get('/', function() {
    return Res::send('Hello World');
});

$app->get('/params/{id}/{name}', function($params, $body, $request) {
    return Res::send('Hello World ' . $params['name']);
});

$app->get('/users', UsersController::class, 'getAll');
$app->post('/users', UsersController::class, 'create');
$app->put('/users/{id}', UsersController::class, 'update');