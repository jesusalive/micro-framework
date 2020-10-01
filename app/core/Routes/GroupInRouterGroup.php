<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Closure;

class GroupInRouterGroup
{
    private string $prefix;
    private Closure $routesFunction;
    private array $middlewares;

    /**
     * GroupRouterGroup constructor.
     * @param string $prefix
     * @param Closure $routesFunction
     * @param array $middlewares
     */
    public function __construct(array $middlewares, string $prefix, Closure $routesFunction)
    {
        $this->prefix = $prefix;
        $this->routesFunction = $routesFunction;
        $this->middlewares = $middlewares;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return GroupInRouterGroup
     */
    public function setPrefix(string $prefix): GroupInRouterGroup
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return Closure
     */
    public function getRoutesFunction(): Closure
    {
        return $this->routesFunction;
    }

    /**
     * @param Closure $routes
     * @return GroupInRouterGroup
     */
    public function setRoutesFunction(Closure $routes): GroupInRouterGroup
    {
        $this->routesFunction = $routes;
        return $this;
    }

    /**
     * @return array
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    /**
     * @param array $middlewares
     * @return GroupInRouterGroup
     */
    public function setMiddlewares(array $middlewares): GroupInRouterGroup
    {
        $this->middlewares = $middlewares;
        return $this;
    }
}
