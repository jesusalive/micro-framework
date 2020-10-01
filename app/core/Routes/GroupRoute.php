<?php

declare(strict_types=1);

namespace LearningCore\Routes;

class GroupRoute
{
    private string $httpVerb;
    private string $name;
    private string $path;
    private $controller;
    private $method;
    private array $middlewares;

    /**
     * GroupRoute constructor.
     * @param string $httpVerb
     * @param string $name
     * @param string $path
     * @param $controller
     * @param $method
     * @param array $middlewares
     */
    public function __construct(
        array $middlewares,
        string $httpVerb,
        string $name,
        string $path,
        $controller,
        string $method = null
    ) {
        $this->httpVerb = $httpVerb;
        $this->name = $name;
        $this->path = $path;
        $this->controller = $controller;
        $this->method = $method;
        $this->middlewares = $middlewares;
    }

    /**
     * @return string
     */
    public function getHttpVerb(): string
    {
        return $this->httpVerb;
    }

    /**
     * @param string $httpVerb
     * @return GroupRoute
     */
    public function setHttpVerb(string $httpVerb): GroupRoute
    {
        $this->httpVerb = $httpVerb;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return GroupRoute
     */
    public function setName(string $name): GroupRoute
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return GroupRoute
     */
    public function setPath(string $path): GroupRoute
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     * @return GroupRoute
     */
    public function setController($controller)
    {
        $this->controller = $controller;
        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return GroupRoute
     */
    public function setMethod(string $method): GroupRoute
    {
        $this->method = $method;
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
     * @return GroupRoute
     */
    public function setMiddlewares(array $middlewares): GroupRoute
    {
        $this->middlewares = $middlewares;
        return $this;
    }
}
