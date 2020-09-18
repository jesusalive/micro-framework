<?php

use Learning\Controllers\UsersController;
use Learning\Core\Res;
use Learning\Core\Routes\Router;

$router = new Router();

$router->get('hello_world', '/', function () {
    return Res::send('Hello World');
});

$router->get('params_test', '/params/{id}/{name}', function ($params, $body, $request) {
    return Res::send('Hello World ' . $params['name']);
});

$router->get('get_users', '/users', UsersController::class, 'getAll');
$router->post('store_users', '/users', UsersController::class, 'create');
$router->put('update_users', '/users/{id}', UsersController::class, 'update');

return $router;
