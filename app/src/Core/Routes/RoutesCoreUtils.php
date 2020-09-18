<?php

declare(strict_types=1);

namespace Learning\Core\Routes;

class RoutesCoreUtils
{
    public static function getRouteParams(array $attributes): array
    {
        $modifiedAttributes = $attributes;
        unset(
            $modifiedAttributes['_route'],
            $modifiedAttributes['controller'],
            $modifiedAttributes['method']
        );

        return $modifiedAttributes;
    }

    public static function handleRouteName(string $name, string $path, string $httpVerb): string
    {
        if (!is_null($name) && is_string($name) && $name != '') {
            return $name;
        }

        return $httpVerb . '_' . $path;
    }
}
