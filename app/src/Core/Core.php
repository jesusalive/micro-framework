<?php

namespace Learning\Core;

use Learning\Utils\RouteUtils;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Core implements HttpKernelInterface
{
    protected $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();
    }

    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($this->routes, $context);

        try {
            $attributes = $matcher->match($request->getPathInfo());
            $routeParams = RouteUtils::getRouteParams($attributes);

            if (!$attributes['method']) {
                $handler = $attributes['controller'];
                return call_user_func_array($handler, $routeParams);
            }

            $controller = new $attributes['controller'];
            $response = new Response(call_user_func_array([$controller, $attributes['method']], $routeParams));
        } catch (ResourceNotFoundException $e) {
            $response = new Response('Not found!', Response::HTTP_NOT_FOUND);
        }

        return $response;
    }

    public function map($path, $controller, $method = null)
    {
        $this->routes->add($path, new Route(
            $path,
            array('controller' => $controller, 'method' => $method)
        ));
    }
}