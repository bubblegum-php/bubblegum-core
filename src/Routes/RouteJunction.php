<?php

namespace Bubblegum\Routes;

use Bubblegum\Exceptions\RouteException;

/**
 * Routes manager or junction
 */
class RouteJunction
{
    /**
     * Get a proper route configuration that fits the request URI
     * @return RouteConfig|null
     * @throws RouteException
     */
    public static function getRouteConfig(): ?RouteConfig
    {
        /* @var RouteConfig[] $routeConfigs */
        $routeConfigs = Route::getRouteConfigs()[$_SERVER['REQUEST_METHOD']];
        $uri = self::clearedUri();
        foreach ($routeConfigs as $routeConfig) {
            if (self::compare($routeConfig, $uri)) {
                return $routeConfig;
            }
        }
        throw new RouteException("No route found for \"{$_SERVER['REQUEST_URI']}\"", 404);
    }

    /**
     * @return string
     */
    public static function clearedUri(): string
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    /**
     * Compare the route config pattern with a URI
     * @param RouteConfig $routeConfig
     * @param string $uri
     * @return string
     */
    public static function compare(RouteConfig $routeConfig, string $uri): string
    {
        return preg_match($routeConfig->getRegexPattern(), $uri);
    }
}