<?php

declare(strict_types=1);

namespace LearningCore;

use LearningCore\Exceptions\MiddlewareException;
use LearningCore\Routes\RoutesCoreUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Kernel implements HttpKernelInterface
{
    protected RouteCollection $routes;

    public function __construct(RouteCollection $routeCollection)
    {
        $this->routes = $routeCollection;
    }

    public function handle(Request $request, int $type = self::MASTER_REQUEST, bool $catch = true)
    {
        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($this->routes, $context);

        try {
            $attributes = $matcher->match($request->getPathInfo());
            $route = $this->routes->get($attributes['_route']);
            $routeParams = RoutesCoreUtils::getRouteParams($attributes);

            if (!$attributes['method']) {
                $handler = $attributes['controller'];
                $requestBody = json_decode($request->getContent());

                $this->executeMiddlewares($route->getMiddlewares(), $request, $routeParams);
                return call_user_func_array($handler, [$routeParams, $requestBody, $request]);
            }

            $controller = new $attributes['controller']($request);

            $this->executeMiddlewares($route->getMiddlewares(), $request, $routeParams);
            $response = call_user_func_array([$controller, $attributes['method']], $routeParams);
        } catch (ResourceNotFoundException $e) {
            $response = Res::error('Not found!', Response::HTTP_NOT_FOUND);
        } catch (MethodNotAllowedException $e) {
            $response = Res::error('Method not allowed!', Response::HTTP_BAD_REQUEST);
        } catch (MiddlewareException $e) {
            $response = Res::error('Middleware Error: ' . $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $response;
    }

    private function executeMiddlewares(array $middlewares, Request $request, array $routeParams = null)
    {
        try {
            foreach ($middlewares as $middleware) {
                (new $middleware())->handle($request, $routeParams);
            }
        } catch (\RuntimeException $e) {
            throw new MiddlewareException($e->getMessage());
        }
    }
}
