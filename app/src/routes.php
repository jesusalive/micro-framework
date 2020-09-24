<?php

use Learning\Controllers\UsersController;
use Learning\Core\ORM\ORMCore;
use Learning\Core\Res;
use Learning\Core\Routes\Router;

$router = new Router();
$entityManager = ORMCore::getEntityManager();

$router->get('hello_world', '/', function () {
    return Res::send('Hello World');
});

$router->get('params_test', '/params/{id}/{name}', function ($params, $body, $request) {
    return Res::send('Hello World ' . $params['name']);
});

$router->get('info', '/info', function ($params, $body, $request) {
    return phpinfo();
});

$router->get('get_users', '/users', UsersController::class, 'getAll');
$router->post('store_users', '/users', UsersController::class, 'create');
$router->put('update_users', '/users/{id}', UsersController::class, 'update');
$router->delete('delete_users', '/users/{id}', UsersController::class, 'delete');

return $router;
