<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Closure;

class GroupInRouterGroup
{
    private string $prefix;
    private Closure $routesFunction;

    /**
     * GroupRouterGroup constructor.
     * @param string $prefix
     * @param Closure $routesFunction
     */
    public function __construct(string $prefix, Closure $routesFunction)
    {
        $this->prefix = $prefix;
        $this->routesFunction = $routesFunction;
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
}
