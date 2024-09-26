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
            $response = $routeConfig->getRoutedComponent()->handle($request, $routeConfig->getData());
            switch (gettype($response)) {
                case 'string':
                    echo $response;
                    return;
                default:
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    return;
            }
        } catch (Exception $ex) {
            echo "<h1>Error {$ex->getCode()}</h1><pre>{$ex->getMessage()}</pre>";
        }
    }
}