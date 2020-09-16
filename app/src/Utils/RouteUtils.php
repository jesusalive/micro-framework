<?php

namespace Learning\Utils;

class RouteUtils
{
    public static function getRouteParams($attributes)
    {
        $modifiedAttributes = $attributes;
        unset(
            $modifiedAttributes['_route'],
            $modifiedAttributes['controller'],
            $modifiedAttributes['method']
        );

        return $modifiedAttributes;
    }

    public static function handleRouteName($name, $path, $httpVerb)
    {
        if (!is_null($name) && is_string($name) && $name != '') {
            return $name;
        }

        return $httpVerb . '_' . $path;
    }
}
