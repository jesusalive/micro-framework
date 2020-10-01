<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Closure;

class GroupRouter implements IGroupRouter
{
    public function get(
        string $name,
        string $path,
        array $middlewares,
        $controller,
        string $method = null
    ): GroupRoute {
        return new GroupRoute($middlewares, 'GET', $name, $path, $controller, $method);
    }

    public function post(
        string $name,
        string $path,
        array $middlewares,
        $controller,
        string $method = null
    ): GroupRoute {
        return new GroupRoute($middlewares, 'POST', $name, $path, $controller, $method);
    }

    public function put(
        string $name,
        string $path,
        array $middlewares,
        $controller,
        string $method = null
    ): GroupRoute {
        return new GroupRoute($middlewares, 'PUT', $name, $path, $controller, $method);
    }

    public function delete(
        string $name,
        string $path,
        array $middlewares,
        $controller,
        string $method = null
    ): GroupRoute {
        return new GroupRoute($middlewares, 'DELETE', $name, $path, $controller, $method);
    }

    public function group(array $middlewares, string $prefix, Closure $routes): GroupInRouterGroup
    {
        return new GroupInRouterGroup($middlewares, $prefix, $routes);
    }
}
