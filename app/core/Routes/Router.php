<?php

declare(strict_types=1);

namespace LearningCore\Routes;

use Symfony\Component\Routing\RouteCollection;

class Router extends AbstractRouter implements IRouter
{
    public function get(string $name, string $path, $controller, string $method = null): void
    {
        $this->map(
            RoutesCoreUtils::handleRouteName($name, $path, 'GET'),
            $path,
            $controller,
            'GET',
            $method
        );
    }

    public function post(string $name, string $path, $controller, string $method = null): void
    {
        $this->map(
            RoutesCoreUtils::handleRouteName($name, $path, 'POST'),
            $path,
            $controller,
            'POST',
            $method
        );
    }

    public function put(string $name, string $path, $controller, string $method = null): void
    {
        $this->map(
            RoutesCoreUtils::handleRouteName($name, $path, 'PUT'),
            $path,
            $controller,
            'PUT',
            $method
        );
    }

    public function delete(string $name, string $path, $controller, string $method = null): void
    {
        $this->map(
            RoutesCoreUtils::handleRouteName($name, $path, 'DELETE'),
            $path,
            $controller,
            'DELETE',
            $method
        );
    }

    public function group(string $prefix, callable $routes): void
    {
        $groupItems = $routes(new GroupRouter());

        foreach ($groupItems as $groupItem) {
            if ($groupItem instanceof GroupInRouterGroup) {
                self::group($prefix . $groupItem->getPrefix(), $groupItem->getRoutesFunction());
                return;
            }

            $routeName = str_replace('/', '', $prefix) . '_' . $groupItem->getName();
            $routePath = $prefix . $groupItem->getPath();

            $this->map(
                RoutesCoreUtils::handleRouteName(
                    $routeName,
                    $routePath,
                    $groupItem->getHttpVerb()
                ),
                $routePath,
                $groupItem->getController(),
                $groupItem->getHttpVerb(),
                $groupItem->getMethod()
            );
        }
    }
}
