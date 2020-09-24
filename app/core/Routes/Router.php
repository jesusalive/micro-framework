<?php

declare(strict_types=1);

namespace LearningCore\Routes;

class Router extends AbstractRouter implements IRouter
{
    public function get(string $name, string $path, $controller, string $method = null): void
    {
        $this->map(
            RoutesCoreUtils::handleRouteName($name, $path, 'GET'),
            $path,
            $controller,
            'GET',
            $method
        );
    }

    public function post(string $name, string $path, $controller, string $method = null): void
    {
        $this->map(
            RoutesCoreUtils::handleRouteName($name, $path, 'POST'),
            $path,
            $controller,
            'POST',
            $method
        );
    }

    public function put(string $name, string $path, $controller, string $method = null): void
    {
        $this->map(
            RoutesCoreUtils::handleRouteName($name, $path, 'PUT'),
            $path,
            $controller,
            'PUT',
            $method
        );
    }

    public function delete(string $name, string $path, $controller, string $method = null): void
    {
        $this->map(
            RoutesCoreUtils::handleRouteName($name, $path, 'DELETE'),
            $path,
            $controller,
            'DELETE',
            $method
        );
    }
}
