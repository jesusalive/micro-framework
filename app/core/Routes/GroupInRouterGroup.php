<?php

declare(strict_types=1);

namespace LearningCore\Routes;

class GroupInRouterGroup
{
    private string $prefix;
    private $routesFunction;

    /**
     * GroupRouterGroup constructor.
     * @param string $prefix
     * @param callable $routesFunction
     */
    public function __construct(string $prefix, callable $routesFunction)
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
     * @return array
     */
    public function getRoutesFunction(): callable
    {
        return $this->routesFunction;
    }

    /**
     * @param callable $routes
     * @return GroupInRouterGroup
     */
    public function setRoutesFunction(callable $routes): GroupInRouterGroup
    {
        $this->routesFunction = $routes;
        return $this;
    }
}
