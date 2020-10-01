<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Symfony\Component\Routing\RouteCollection;
use LearningCore\Routes\Route;

abstract class AbstractRouter
{
    protected RouteCollection $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();
    }

    protected function map(
        string $name,
        string $path,
        $controller,
        string $httpVerb,
        string $controllerMethod = null,
        array $middlewares = []
    ): void {
        $this->routes->add(
            $name,
            new Route(
                $path,
                ['controller' => $controller, 'method' => $controllerMethod],
                [],
                [],
                null,
                [],
                [$httpVerb],
                '',
                $middlewares
            )
        );
    }

    public function getRoutesCollection(): RouteCollection
    {
        return $this->routes;
    }
}
