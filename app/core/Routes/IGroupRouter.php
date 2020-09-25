<?php


namespace LearningCore\Routes;


interface IGroupRouter
{
    public function get(string $name, string $path, $controller, string $method = null): GroupRoute;
    public function post(string $name, string $path, $controller, string $method = null): GroupRoute;
    public function put(string $name, string $path, $controller, string $method = null): GroupRoute;
    public function delete(string $name, string $path, $controller, string $method = null): GroupRoute;
}