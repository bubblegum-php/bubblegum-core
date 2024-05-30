<?php

namespace Bubblegum\Routes;

class RouteConfig
{
    protected string $regexPattern;
    protected string $destinationName;


    public function __construct(protected string $uri, protected string $routedComponentName, ?string $destinationNameByDefault = null)
    {
        $this->destinationName = $destinationNameByDefault;
        $this->regexPattern = $this->generateRegexPattern();
    }

    public function to(string $destinationName): RouteConfig
    {
        $this->$destinationName = $destinationName;
        return $this;
    }

    public function getRoutedComponent(): RoutedComponent
    {
        return new $this->routedComponentName($this->destinationName);
    }

    protected function generateRegexPattern(): string
    {
        $escaped = preg_quote(trim($this->uri, '/'), '/');
        return "/^$escaped\$/";
    }

    public function getRegexPattern(): string
    {
        return $this->regexPattern;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}