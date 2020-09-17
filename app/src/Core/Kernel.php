<?php
declare(strict_types=1);

namespace Learning\Core;

use Learning\Core\Routes\RoutesCoreUtils;
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

    function __construct(RouteCollection $routeCollection)
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
            $routeParams = RoutesCoreUtils::getRouteParams($attributes);

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
}