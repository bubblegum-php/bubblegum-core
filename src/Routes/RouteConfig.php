<?php

namespace Bubblegum\Routes;

class RouteConfig
{
    protected string $method;

    public function __construct(protected $url, protected $controller, $methodByDefault)
    { }

    public function method(string $name): RouteConfig
    {
        $this->method = $name;
        return $this;
    }

}