<?php

namespace Learning\Utils;

class RouteUtils
{
    public static function getRouteParams($attributes) {
        $modifiedAtributes = $attributes;
        unset(
            $modifiedAtributes['_route'],
            $modifiedAtributes['controller'],
            $modifiedAtributes['method']
        );

        return $modifiedAtributes;
    }
}