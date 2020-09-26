<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Closure;

interface IGroupRouter
{
    public function get(string $name, string $path, $controller, string $method = null): GroupRoute;
    public function post(string $name, string $path, $controller, string $method = null): GroupRoute;
    public function put(string $name, string $path, $controller, string $method = null): GroupRoute;
    public function delete(string $name, string $path, $controller, string $method = null): GroupRoute;
    public function group(string $prefix, Closure $routes): GroupInRouterGroup;
}
