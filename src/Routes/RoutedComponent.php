<?php

namespace Bubblegum\Routes;

use Bubblegum\Request;

/**
 * Routed component, component that can deal with the route system
 */
abstract class RoutedComponent
{
    /**
     * @param string $destinationName
     */
    public function __construct(protected string $destinationName)
    {}

    /**
     * Get the content from this component
     * @param Request $request
     * @param array $data
     * @return string
     */
    abstract public function content(Request $request, array $data = []): string;
}