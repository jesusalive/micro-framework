<?php

namespace LearningCore\Routes;

class GroupRouter implements IGroupRouter
{

    public function get(string $name, string $path, $controller, string $method = null): GroupRoute
    {
        return new GroupRoute('GET', $name, $path, $controller, $method);
    }

    public function post(string $name, string $path, $controller, string $method = null): GroupRoute
    {
        return new GroupRoute('POST', $name, $path, $controller, $method);
    }

    public function put(string $name, string $path, $controller, string $method = null): GroupRoute
    {
        return new GroupRoute('PUT', $name, $path, $controller, $method);
    }

    public function delete(string $name, string $path, $controller, string $method = null): GroupRoute
    {
        return new GroupRoute('DELETE', $name, $path, $controller, $method);
    }
}