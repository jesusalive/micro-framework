<?php

use Learning\Controllers\UsersController;
use Learning\Middlewares\CheckBodyForName;
use LearningCore\ORM\ORMCore;
use LearningCore\Res;
use LearningCore\Routes\GroupRouter;
use LearningCore\Routes\Router;

$router = new Router();
$entityManager = ORMCore::getEntityManager();

$router->get('hello_world', '/', [], function () {
    return Res::send('Hello World');
});

$router->get(
    'check_middleware',
    '/middleware',
    [CheckBodyForName::class],
    function () {
        return Res::send('No Intercepted');
    }
);

$router->get('params_test', '/params/{id}/{name}', [], function ($params, $body, $request) {
    return Res::send('Hello World ' . $params['name']);
});

$router->get('info', '/info', [], function ($params, $body, $request) {
    return phpinfo();
});

$router->group([], '/prefix', function (GroupRouter $router) {
    return [
        $router->get('dale', '/dale', [], function () {
            return Res::send("ola");
        }),

        $router->get('test', '/test', [], function () {
            return Res::send("test1");
        }),

        $router->group([], '/prefix2', function (GroupRouter $router) {
            return [
                $router->get('dale2', '/dale', [], function () {
                    return Res::send("ola2");
                }),

                $router->get('test2', '/test', [], function () {
                    return Res::send("test2");
                })
            ];
        })
    ];
});

$router->get('get_users', '/users', [], UsersController::class, 'getAll');
$router->post('store_users', '/users', [], UsersController::class, 'create');
$router->put('update_users', '/users/{id}', [], UsersController::class, 'update');
$router->delete('delete_users', '/users/{id}', [], UsersController::class, 'delete');

return $router;
