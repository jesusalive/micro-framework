<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Symfony\Component\Routing\Route as RouteComponent;

class Route extends RouteComponent
{
    protected array $middlewares;

    public function __construct(
        string $path,
        array $defaults = [],
        array $requirements = [],
        array $options = [],
        ?string $host = '',
        $schemes = [],
        $methods = [],
        ?string $condition = '',
        array $middlewares = []
    ) {
        parent::__construct($path, $defaults, $requirements, $options, $host, $schemes, $methods, $condition);
        $this->middlewares = $middlewares;
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
     * @return Route
     */
    public function setMiddlewares(array $middlewares): Route
    {
        $this->middlewares = $middlewares;
        return $this;
    }
}
