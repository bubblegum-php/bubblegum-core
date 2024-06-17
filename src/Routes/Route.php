<?php

namespace Bubblegum\Routes;

/**
 * Route manager class
 */
class Route
{
    /**
     * @var array|array[]
     */
    protected static array $routeConfigs = [
        'GET' => array(),
        'POST' => array(),
    ];

    /**
     * @var array|string[]
     */
    protected static array $defaultMethods = [
        'GET' => 'index',
        'POST' => 'store',
    ];

    /**
     * @param string $uri
     * @param string $routedComponentName
     * @return RouteConfig
     */
    public static function get(string $uri, string $routedComponentName): RouteConfig
    {
        return self::route('GET', $uri, $routedComponentName);
    }

    /**
     * @param string $uri
     * @param string $routedComponentName
     * @return RouteConfig
     */
    public static function post(string $uri, string $routedComponentName): RouteConfig
    {
        return self::route('POST', $uri, $routedComponentName);
    }

    /**
     * @param string $httpMethod
     * @param string $uri
     * @param string $routedComponentName
     * @return RouteConfig
     */
    public static function route(string $httpMethod, string $uri, string $routedComponentName): RouteConfig
    {
        $routeConfig = new RouteConfig($uri, $routedComponentName, self::$defaultMethods[$httpMethod]);
        self::$routeConfigs[$httpMethod][] = $routeConfig;
        return $routeConfig;
    }

    /**
     * @return array|array[]
     */
    public static function getRouteConfigs(): array
    {
        return self::$routeConfigs;
    }
}