<?php

declare(strict_types=1);

namespace LearningCore\Routes;

interface IRouter
{
    public function get(string $name, string $path, $controller, string $method = null): void;
    public function post(string $name, string $path, $controller, string $method = null): void;
    public function put(string $name, string $path, $controller, string $method = null): void;
    public function delete(string $name, string $path, $controller, string $method = null): void;
    public function group(string $prefix, callable $routes): void;
}
