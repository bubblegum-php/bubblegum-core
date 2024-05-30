<?php

namespace Bubblegum;

use Bubblegum\Routes\RouteJunction;

class App
{
    public static function run(): void
    {
        $routeConfig = RouteJunction::getRouteConfig();
        if (!$routeConfig) {
            echo '<h1>404</h1>';
            return;
        }
        $request = new Request([]);
        echo $routeConfig->getRoutedComponent()->referToDestination($request);
    }
}