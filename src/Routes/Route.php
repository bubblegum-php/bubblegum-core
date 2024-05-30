<?php

namespace Bubblegum\Routes;

class Route
{
    protected static array $routeConfigs = [
        'GET' => array(),
        'POST' => array(),
    ];

    protected static array $defaultMethods = [
        'GET' => 'index',
        'POST' => 'store',
    ];

    public static function get(string $uri, string $routedComponentName): RouteConfig
    {
        return self::route('GET', $uri, $routedComponentName);
    }

    public static function post(string $uri, string $routedComponentName): RouteConfig
    {
        return self::route('POST', $uri, $routedComponentName);
    }

    public static function route(string $httpMethod, string $uri, string $routedComponentName): RouteConfig
    {
        $routeConfig = new RouteConfig($uri, $routedComponentName, self::$defaultMethods[$httpMethod]);
        self::$routeConfigs[$httpMethod][] = $routeConfig;
        return $routeConfig;
    }

    public static function getRouteConfigs(): array
    {
        return self::$routeConfigs;
    }
}