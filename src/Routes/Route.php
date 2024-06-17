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
        'PUT' => array(),
        'PATCH' => array(),
        'DELETE' => array(),
        'HEAD' => array(),
        'OPTIONS' => array()
    ];

    /**
     * @var array|string[]
     */
    protected static array $defaultMethods = [
        'GET' => 'index',
        'POST' => 'store',
        'PUT' => 'update',
        'PATCH' => 'patch',
        'DELETE' => 'destroy',
        'HEAD' => 'head',
        'OPTIONS' => 'options'
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
     * @param string $uri
     * @param string $routedComponentName
     * @return RouteConfig
     */
    public static function update(string $uri, string $routedComponentName): RouteConfig
    {
        return self::route('PUT', $uri, $routedComponentName);
    }

    /**
     * @param string $uri
     * @param string $routedComponentName
     * @return RouteConfig
     */
    public static function patch(string $uri, string $routedComponentName): RouteConfig
    {
        return self::route('PATCH', $uri, $routedComponentName);
    }

    /**
     * @param string $uri
     * @param string $routedComponentName
     * @return RouteConfig
     */
    public static function destroy(string $uri, string $routedComponentName): RouteConfig
    {
        return self::route('DELETE', $uri, $routedComponentName);
    }

    /**
     * @param string $uri
     * @param string $routedComponentName
     * @return RouteConfig
     */
    public static function head(string $uri, string $routedComponentName): RouteConfig
    {
        return self::route('HEAD', $uri, $routedComponentName);
    }

    /**
     * @param string $uri
     * @param string $routedComponentName
     * @return RouteConfig
     */
    public static function options(string $uri, string $routedComponentName): RouteConfig
    {
        return self::route('OPTIONS', $uri, $routedComponentName);
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