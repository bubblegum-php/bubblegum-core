<?php

namespace Bubblegum\Routes;

use Bubblegum\Request;

/**
 * Routed component, component that can deal with the route system
 */
abstract class RoutedComponent
{
    abstract public function setDestinationName($destinationName);
    abstract public function getDestinationName(): string;

    /**
     * Get the content from this component
     * @param Request $request
     * @param array $data
     * @return string|array
     */
    abstract public function handle(Request $request, array $data = []): string|array;
}