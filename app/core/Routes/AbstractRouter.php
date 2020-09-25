<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

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
        string $controllerMethod = null
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
                [$httpVerb]
            )
        );
    }

    public function getRoutesCollection(): RouteCollection
    {
        return $this->routes;
    }
}
