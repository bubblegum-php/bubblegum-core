<?php

namespace Bubblegum;

use Bubblegum\Routes\RouteJunction;
use Exception;

/**
 * Bubblegum application
 */
class App
{
    /**
     * Run application
     * @return void
     */
    public static function run(): void
    {
        try {
            $routeConfig = RouteJunction::getRouteConfig();
            $request = new Request();
            echo $routeConfig->getRoutedComponent()->content($request, $routeConfig->getData());
        } catch (Exception $ex) {
            echo "<h1>Error {$ex->getCode()}</h1><pre>{$ex->getMessage()}</pre>";
        }
    }
}