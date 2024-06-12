<?php

namespace Bubblegum\Routes;

use Bubblegum\Exceptions\RouteException;

class RouteJunction
{
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

    public static function clearedUri(): string
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public static function compare(RouteConfig $routeConfig, string $uri): string
    {
        return preg_match($routeConfig->getRegexPattern(), $uri);
    }
}