<?php

use Learning\Controllers\UsersController;
use Learning\Core\Res;
use Learning\Core\Routes\Router;

$app = new Router();

$app->get('hello_world','/', function() {
    return Res::send('Hello World');
});

$app->get('params_test','/params/{id}/{name}', function($params, $body, $request) {
    return Res::send('Hello World ' . $params['name']);
});

$app->get('get_users','/users', UsersController::class, 'getAll');
$app->post('store_users','/users', UsersController::class, 'create');
$app->put('update_users','/users/{id}', UsersController::class, 'update');