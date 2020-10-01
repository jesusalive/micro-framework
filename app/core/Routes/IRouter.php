<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Closure;

interface IRouter
{
    public function get(string $name, string $path, array $middlewares, $controller, string $method = null): void;
    public function post(string $name, string $path, array $middlewares, $controller, string $method = null): void;
    public function put(string $name, string $path, array $middlewares, $controller, string $method = null): void;
    public function delete(string $name, string $path, array $middlewares, $controller, string $method = null): void;
    public function group(array $middlewares, string $prefix, Closure $routes): void;
}
