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
            if (self::compareWithDataExtracting($routeConfig, $uri)) {
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
     * Compare the route configuration pattern with a URI, extracts URI data into the route configuration
     * @param RouteConfig $routeConfig
     * @param string $uri
     * @return bool
     */
    public static function compareWithDataExtracting(RouteConfig &$routeConfig, string $uri): bool
    {
        $matches = array();
        if (preg_match($routeConfig->getRegexPattern(), $uri, $matches)) {
            $routeConfig->withDataSupplement(array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY));
            return true;
        }
        return false;
    }
}