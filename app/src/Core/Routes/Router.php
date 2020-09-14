<?php

namespace Learning\Core\Routes;

class Router extends AbstractRouter
{
    public function get($path, $controller, $method = null)
    {
        return $this->map($path, $controller, $method, 'GET');
    }

    public function post($path, $controller, $method = null)
    {
        return $this->map($path, $controller, $method, 'POST');
    }

    public function put($path, $controller, $method = null)
    {
        return $this->map($path, $controller, $method, 'PUT');
    }

    public function delete($path, $controller, $method = null)
    {
        return $this->map($path, $controller, $method, 'DELETE');
    }
}