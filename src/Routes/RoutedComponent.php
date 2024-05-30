<?php

namespace Bubblegum\Routes;

use Bubblegum\Request;

abstract class RoutedComponent
{
    public function __construct(protected string $destinationName)
    {}
    
    abstract function referToDestination(Request $request): string;
}