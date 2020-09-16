<?php

namespace Learning\Core\Routes;

use Learning\Utils\RouteUtils;

class Router extends AbstractRouter
{
    public function get($name, $path, $controller, $method = null)
    {
        return $this->map(
            RouteUtils::handleRouteName($name, $path, 'GET'),
            $path,
            $controller,
            $method,
            'GET'
        );
    }

    public function post($name, $path, $controller, $method = null)
    {
        return $this->map(
            RouteUtils::handleRouteName($name, $path, 'POST'),
            $path,
            $controller,
            $method,
            'POST'
        );
    }

    public function put($name, $path, $controller, $method = null)
    {
        return $this->map(
            RouteUtils::handleRouteName($name, $path, 'PUT'),
            $path,
            $controller,
            $method,
            'PUT'
        );
    }

    public function delete($name, $path, $controller, $method = null)
    {
        return $this->map(
            RouteUtils::handleRouteName($name, $path, 'DELETE'),
            $path,
            $controller,
            $method,
            'DELETE'
        );
    }
}