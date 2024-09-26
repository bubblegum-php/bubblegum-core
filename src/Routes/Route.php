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
     * @param string $uriTemplate
     * @param string|RoutedComponent $routedComponentClass
     * @return RouteConfig
     */
    public static function get(string $uriTemplate, string|RoutedComponent $routedComponentClass): RouteConfig
    {
        return self::route('GET', $uriTemplate, $routedComponentClass);
    }

    /**
     * @param string $uriTemplate
     * @param string|RoutedComponent $routedComponentClass
     * @return RouteConfig
     */
    public static function post(string $uriTemplate, string|RoutedComponent $routedComponentClass): RouteConfig
    {
        return self::route('POST', $uriTemplate, $routedComponentClass);
    }

    /**
     * @param string $uriTemplate
     * @param string|RoutedComponent $routedComponentClass
     * @return RouteConfig
     */
    public static function update(string $uriTemplate, string|RoutedComponent $routedComponentClass): RouteConfig
    {
        return self::route('PUT', $uriTemplate, $routedComponentClass);
    }

    /**
     * @param string $uriTemplate
     * @param string|RoutedComponent $routedComponentClass
     * @return RouteConfig
     */
    public static function patch(string $uriTemplate, string|RoutedComponent $routedComponentClass): RouteConfig
    {
        return self::route('PATCH', $uriTemplate, $routedComponentClass);
    }

    /**
     * @param string $uriTemplate
     * @param string|RoutedComponent $routedComponentClass
     * @return RouteConfig
     */
    public static function destroy(string $uriTemplate, string|RoutedComponent $routedComponentClass): RouteConfig
    {
        return self::route('DELETE', $uriTemplate, $routedComponentClass);
    }

    /**
     * @param string $uriTemplate
     * @param string|RoutedComponent $routedComponentClass
     * @return RouteConfig
     */
    public static function head(string $uriTemplate, string|RoutedComponent $routedComponentClass): RouteConfig
    {
        return self::route('HEAD', $uriTemplate, $routedComponentClass);
    }

    /**
     * @param string $uriTemplate
     * @param string|RoutedComponent $routedComponentClass
     * @return RouteConfig
     */
    public static function options(string $uriTemplate, string|RoutedComponent $routedComponentClass): RouteConfig
    {
        return self::route('OPTIONS', $uriTemplate, $routedComponentClass);
    }

    /**
     * @param string $httpMethod
     * @param string $uri
     * @param string|RoutedComponent $routedComponentClass
     * @return RouteConfig
     */
    public static function route(string $httpMethod, string $uri, string|RoutedComponent $routedComponentClass): RouteConfig
    {
        $routeConfig = new RouteConfig($uri, $routedComponentClass, self::$defaultMethods[$httpMethod]);
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