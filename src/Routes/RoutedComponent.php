<?php

namespace Bubblegum\Routes;

use Bubblegum\Request;

/**
 * Routed component, component that can deal with the route system
 */
abstract class RoutedComponent
{
    protected string $destinationName;
    /**
     * @param string $destinationName
     */
    public function __construct(string $destinationName)
    {
        $this->setDestinationName($destinationName);
    }

    public function setDestinationName($destinationName): void
    {
        $this->destinationName = $destinationName;
    }
    public function getDestinationName(): string
    {
        return $this->destinationName;
    }

    /**
     * Get the content from this component
     * @param Request $request
     * @param array $data
     * @return string
     */
    abstract public function handle(Request $request, array $data = []): string;
}