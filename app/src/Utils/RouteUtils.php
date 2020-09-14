<?php

namespace Learning\Utils;

class RouteUtils
{
    public static function getRouteParams($attributes) {
        $modifiedAttributes = $attributes;
        unset(
            $modifiedAttributes['_route'],
            $modifiedAttributes['controller'],
            $modifiedAttributes['method']
        );

        return $modifiedAttributes;
    }
}