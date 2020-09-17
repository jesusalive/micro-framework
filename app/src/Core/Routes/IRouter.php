<?php


namespace Learning\Core\Routes;


interface IRouter
{
    public function get($name, $path, $controller, $method = null);
    public function post($name, $path, $controller, $method = null);
    public function put($name, $path, $controller, $method = null);
    public function delete($name, $path, $controller, $method = null);
}