<?php

namespace Learning\Core\Routes;

use Learning\Core\Res;
use Learning\Utils\RouteUtils;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

abstract class AbstractRouter implements HttpKernelInterface
{
    protected $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();
    }

    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($this->routes, $context);

        try {
            $attributes = $matcher->match($request->getPathInfo());
            $routeParams = RouteUtils::getRouteParams($attributes);

            if (!$attributes['method']) {
                $handler = $attributes['controller'];
                $requestBody = json_decode($request->getContent());

                return call_user_func_array($handler, [$routeParams, $requestBody, $request]);
            }

            $controller = new $attributes['controller']($request);
            $response = call_user_func_array([$controller, $attributes['method']], $routeParams);
        } catch (ResourceNotFoundException $e) {
            $response = Res::error('Not found!', Response::HTTP_NOT_FOUND);
        } catch (MethodNotAllowedException $e) {
            $response = Res::error('Method not allowed!', Response::HTTP_BAD_REQUEST);
        }

        return $response;
    }

    public function map($path, $controller, $controllerMethod, $httpVerb)
    {
        $this->routes->add(
            $path,
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
}