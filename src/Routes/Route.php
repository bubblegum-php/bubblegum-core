<?php

namespace Bubblegum\Routes;

class Route
{
    protected static array $routes = [
        'GET' => array(),
        'POST' => array(),
    ];

    protected static array $defaultMethods = [
        'GET' => 'index',
        'POST' => 'store',
    ];

    public static function get(string $url, $controller): RouteConfig
    {
        return self::route('GET', $url, $controller);
    }

    public static function post(string $url, $controller): RouteConfig
    {
        return self::route('POST', $url, $controller);
    }

    public static function route(string $httpMethod, string $url, $controller): RouteConfig
    {
        $routeConfig = new RouteConfig($url, $controller, self::$defaultMethods[$httpMethod]);
        self::$routes[$httpMethod][] = $routeConfig;
        return $routeConfig;
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }
}