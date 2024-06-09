<?php

namespace Bubblegum\Routes;

use Bubblegum\Request;

abstract class RoutedComponent
{
    public function __construct(protected string $destinationName)
    {}
    
    abstract public function content(Request $request, array $data = []): string;
}