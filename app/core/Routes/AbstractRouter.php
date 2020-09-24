<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Learning\Core\Res;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

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
